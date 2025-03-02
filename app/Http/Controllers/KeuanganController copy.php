<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\NamaKelas;
use App\Models\DataInvoice;
use App\Models\DataPembayaran;
use App\Models\DataTagihan;
use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KeuanganController extends Controller
{
    //invoice
    public function Invoice()
    {
        $dataSiswa = DataSiswa::orderBy('siswa_kelas_id', 'asc')->select('siswa_nama', 'siswa_nis', 'siswa_kelas_id')
            ->with(['kelas:kelas_id,kelas_nama']) // Ambil hanya kolom 'kelas_nama'ari tabel kelas
            ->where('soft_deleted', 0)
            ->where('siswa_kelas_id', '<', 16)
            ->get();
        // Mengelompokkan siswa berdasarkan kelas
        $siswaGrouped = [];
        foreach ($dataSiswa as $siswa) {
            $kelasNama = $siswa->kelas->kelas_nama ?? 'Tanpa Kelas';
            $siswaGrouped[$kelasNama][] = [
                'siswa_nama' => $siswa->siswa_nama,
                'siswa_nis' => $siswa->siswa_nis,
            ];
        }
        // dd($dataSiswa[0]['kelas']);
        // dd($siswaGrouped);
        return view('admin/invoice', [
            'title' => 'Tambah Invoice',
            'siswa' => $siswaGrouped
        ]);
    }

    public function TambahInvoice(Request $request)
    {
        dd($request->all());

        $siswaTerpilih = request('siswa'); // Array ["12345|John Doe", "67890|Jane Doe"]
        $dataSiswa = [];
        $DataTagihan = DataTagihan::orderBy('id_tagihan', 'desc')->get();

        foreach ($siswaTerpilih as $siswa) {
            list($nis, $nama) = explode('|', $siswa);
            $dataSiswa[] = ['nis' => $nis, 'nama' => $nama];
        }
        // Lempar data siswa sebagai JSON ke view
        $dataSiswaJson = json_encode($dataSiswa);
        // dd($dataSiswaJson);
        return view('admin/TambahTagihan', [
            'title' => $request->NmInvoice,
            'siswa' => $dataSiswa,
            'dataSiswaJson' => $dataSiswaJson,
            'TglInv' => $request->TglInv,
            'Jenis' => $DataTagihan,
            'TglJt' => $request->TglTempo
            // 'TglInv'=>Carbon::parse($request->TglInv)->translatedFormat('d F Y'),
            // 'TglJt'=>Carbon::parse($request->TglTempo)->translatedFormat('d F Y')
        ]);
    }
    public function SimpanInvoice(Request $request)
    {
        $siswaJson = $request->input('data_siswa');
        $siswaData = json_decode($siswaJson, true) ?? []; // Pastikan tidak null
        $kdInvoice = $this->generateKodeInvoice();

        $totalTagihan = array_sum($request->tagihan ?? []);
        $potongan = $request->potongan ?? 0;
        $tgl_invoice = Carbon::createFromFormat('m/d/Y', $request->tanggal_invoice)->format('Y-m-d');
        $jt_invoice = Carbon::createFromFormat('m/d/Y', $request->tanggal_jatuh_tempo)->format('Y-m-d');
        // return redirect()->route('invoice.siswa')->with('success', 'Invoice berhasil disimpan!');
        // return redirect()->back()->with('error', 'Terjadi kesalahan: ');
        // dd($request);
        return redirect()->route('tambah.invoice')->with('error', 'Terjadi kesalahan: ');
        DB::beginTransaction();
        try {
            // Simpan data ke tbl_invoice
            $invoice = DataInvoice::create([
                'kd_invoice'    => $kdInvoice,
                'nm_invoice'    => $request->nm_invoice,
                'tgl_invoice'   => $tgl_invoice,
                'jt_invoice'    => $jt_invoice,
                'total_invoice' => $totalTagihan,
                'potongan'      => $potongan,
                'total_bayar'   => ($totalTagihan - $potongan)
            ]);
            // dd($request->all());
            // Pastikan data tagihan ada
            if (!empty($request->jenis_tagihan) && !empty($request->tagihan)) {
                $invoiceDetails = [];

                foreach ($siswaData as $siswa) {
                    foreach ($request->jenis_tagihan as $key => $id_tagihan) {
                        $invoiceDetails[] = [
                            'id_invoice' => $invoice->id_invoice,
                            'siswa_nis'  => $siswa['nis'],
                            'tagihan'    => json_encode([
                                'jumlah'    => $request->tagihan[$key],
                                'deskripsi' => $request->deskripsi[$key] ?? '', 
                                'id_tagihan'=> $id_tagihan,
                            ]),
                        ];                        
                    }
                }

                if (!empty($invoiceDetails)) {
                    InvoiceDetail::insert($invoiceDetails); // Bulk insert untuk efisiensi
                }
            }

            DB::commit();
            return redirect()->route('invoice.siswa')->with('success', 'Invoice berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('tambah.invoice')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function JenisTagihan()
    {
        $DataTagihan = DataTagihan::orderBy('id_tagihan', 'desc')->get();
        // dd($DataTagihan);
        return view('admin/JenisTagihan', [
            'title' => 'Daftar Tagihan',
            'tagihan' => $DataTagihan
        ]);
    }

    public function UpdateTagihan(Request $request)
    {
        // dd( $request->nominal);
        $tagihan = DataTagihan::find($request->id);
        if ($tagihan) {
            $tagihan->jns_tagihan = $request->nama;
            $tagihan->nom_tagihan = $request->nominal;
            $tagihan->save();

            return response()->json([
                'success' => true,
                'message' => 'Tagihan berhasil diperbarui'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui tagihan'
            ]);
        }
    }
    // end of invoice
    //pembayaran
    public function Pembayaran()
    {
        $dataKelas = NamaKelas::where('kelas_id', '<', 16)->get();
        return view('admin/PembayaranSiswa', [
            'title' => 'Pilih Siswa',
            'kelas' => $dataKelas
        ]);
    }
    public function getInvoiceByNis($nis)
    {
        // Ambil data siswa beserta kelasnya
        $DataSiswa = DataSiswa::with('kelas:kelas_id,kelas_nama')
            ->where('siswa_nis', $nis)
            ->select('siswa_nama', 'siswa_nis', 'siswa_kelas_id')
            ->first();
        // dd($DataSiswa);

        // Jika siswa tidak ditemukan, kembalikan response kosong
        if (!$DataSiswa) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data siswa tidak ditemukan',
            ], 404);
        }

        // Ambil data invoice berdasarkan NIS
        $invoices = InvoiceDetail::with('invoice') // Memuat data dari DataInvoice
            ->where('siswa_nis', $nis)
            ->get();
        // dd($invoices);
        // Format response JSON agar lebih mudah digunakan di frontend
        return response()->json([
            'status' => 'success',
            'siswa' => [
                'nama' => $DataSiswa->siswa_nama,
                'nis' => $DataSiswa->siswa_nis,
                'alamat' => $DataSiswa->siswa_alamat,
                'kelas' => $DataSiswa->kelas ? $DataSiswa->kelas->kelas_nama : 'Tidak ada data',
            ],
            'DataInvoices' => $invoices->map(function ($invoice) use ($nis) {
                $totalPembayaran = $invoice->totalPembayaran($nis);
                return [
                    'id_invoice' => $invoice->invoice->id_invoice,
                    'kd_invoice' => $invoice->invoice->kd_invoice ?? 'Tidak ada data',
                    'nm_invoice' => $invoice->invoice->nm_invoice ?? 'Tidak ada data',
                    'total_bayar' => $invoice->invoice->total_bayar ?? 0,
                    'sisa_tagihan' => $invoice->invoice->total_bayar - $totalPembayaran,
                ];
            }),
        ]);
    }

    public function Bayar(Request $request)
    {
        try {

            // Proses pembayaran
            Log::info('Pembayaran berhasil', ['id' => $request->idBayar]);

            // $checkData = [
            //     'idnya' => $request->idBayar,
            //     'Jumlahnya'=>$request->jmlBayar,
            //     'NIS'=>$request->nisSiswa,
            //     'tanggalnya'=>$request->tglBayar
            // ];
            DataPembayaran::create([
                'siswa_nis'    => $request->nisSiswa,
                'id_invoice'    => $request->idBayar,
                'tgl_pembayaran'   => $request->tglBayar,
                'nom_pembayaran'    => $request->jmlBayar,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Pembayaran berhasil',
                // 'data' => $request->nisSiswa // atau sesuaikan dengan response yang diinginkan
            ]);
        } catch (\Exception $e) {
            Log::error('Pembayaran gagal', ['error' => $e->getMessage()]);
            return response()->json(['status' => 'error', 'message' => 'Terjadi kesalahan'], 500);
        }
    }

    public function Detail($id, $nis)
    {
        // Ambil data siswa beserta kelasnya
        $DataSiswa = DataSiswa::with('kelas:kelas_id,kelas_nama')
            ->where('siswa_nis', $nis)
            ->select('siswa_nama', 'siswa_nis', 'siswa_kelas_id')
            ->first();
        // dd( $DataSiswa->kelas);
        $invoices = InvoiceDetail::with('invoice') // Memuat data dari DataInvoice
            ->where('siswa_nis', $nis)
            ->where('id_invoice', $id)
            ->first();

        $dataPembayaran = DataPembayaran::with('invoice')
            ->where('id_invoice', $id)
            ->where('siswa_nis', $nis)
            ->get();

        $totalPembayaran = $invoices->totalPembayaran($nis);


        // $DataTagihan = json_decode($invoices->tagihan);
        // dd($invoices->invoice);
        return view('admin/DetailInvoice', [
            'title' => 'Detail Invoice',
            'siswa' => $DataSiswa,
            'dataTagihan' => $invoices->tagihan_detail,
            'dataInvoice' => $invoices,
            'totalPembayaran' => $totalPembayaran,
            'dataPembayaran' => $dataPembayaran
        ]);
    }

    public function Kategori()
    {
        return view('admin/KategoriInvoice', [
            'title' => 'Kategori Invoice'
        ]);
    }

    public function getTagihan()
    {
        $tagihan = DataTagihan::where('status', 1)->orderBy('id_tagihan', 'desc')->get();
        // $tagihan = DataTagihan::all();
        return response()->json($tagihan);
    }

    public function SimpanTagihan(Request $request)
    {
        // dd( $request->nominal);
        $request->validate([
            'nama' => 'required|string|max:255',
            'nominal' => 'required|numeric',
        ]);

        $tagihan = DataTagihan::create([
            'jns_tagihan' => $request->nama,
            'nom_tagihan' => $request->nominal,
            'status' => '1',
        ]);

        return response()->json(['success' => true, 'tagihan' => $tagihan]);
    }

    public function HapusTagihan($id)
    {
        // dd($id);
        $tagihan = DataTagihan::findOrFail($id);
        $tagihan->update(['status' => 0]);

        return response()->json(['success' => true]);
    }

    public function getTglPembayaranFormattedAttribute()
    {
        return Carbon::parse($this->tgl_pembayaran)->translatedFormat('d F Y');
    }


    // end of pembayarn



    // public suport
    public function generateKodeInvoice()
    {
        $prefix = 'INV';
        $bulanTahun = date('Ym'); // Format: 202502

        // Cek invoice terakhir berdasarkan bulan & tahun saat ini
        $lastInvoice = DataInvoice::whereRaw("DATE_FORMAT(tgl_invoice, '%Y%m') = ?", [$bulanTahun])
            ->orderBy('id_invoice', 'desc')
            ->first();

        // Kalau belum ada data, mulai dari 1
        $nextNumber = $lastInvoice ? ((int)substr($lastInvoice->kd_invoice, -4)) + 1 : 1;

        // Format jadi 4 digit (0001, 0002, ...)
        $kodeInvoice = sprintf("%s-%s-%03d", $prefix, $bulanTahun, $nextNumber);

        return $kodeInvoice;
    }
}
