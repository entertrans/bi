<?php

namespace App\Http\Controllers;

use App\Models\dataMapel;
use App\Models\DataSiswa;
use App\Models\NamaKelas;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use App\Models\DataPelajaran;
use App\Models\DataRaport;
use Yajra\DataTables\Facades\DataTables; // Tambahkan ini

class eraportControler extends Controller
{
    public function Ta()
    {
        $Ta = TahunAjaran::getAllDesc();
        // dd($Ta[0]['thn_ajaran']);
        return view('admin/tahunAjaran', ['title' => 'Data Tahun Ajaran', 'dt_ta' => $Ta]);
    }
    public function pilihSiswa($id)
    {
        $dataKelas = NamaKelas::where('kelas_id', '<', 16)->get();
        // dd($id);
        return view('admin/pilihSiswa', [
            'title' => 'Data Siswa',
            'kelas' => $dataKelas,
            'id_ta' => $id
        ]);
    }
    // public function isiRaport($id,$siswa) {
    //     $DataSiswa = DataSiswa::with([
    //         'kelas:kelas_id,kelas_nama'
    //     ])
    //     ->where('siswa_nis', $siswa)
    //     ->select('siswa_id', 'siswa_nama', 'siswa_nis', 'siswa_nisn', 'siswa_alamat', 'siswa_kelas_id') // Tambahkan ini
    //     ->first();
    //     $dataTa = TahunAjaran::where('id_ta', $id)->first(); 
    //     $pelajaran = dataPelajaran::with('mapel') ->where('id_kelas', $DataSiswa['siswa_kelas_id'])->get();
    //     // dd($pelajaran);
    //     return view('admin/isiRaport', [
    //         'title' => 'isi Raport Siswa',
    //         'siswa' => $DataSiswa,
    //         'id_ta' => $id,
    //         'mapel'=>$pelajaran,
    //         'dataTa' => $dataTa
    //     ]);

    //     // dd($DataSiswa);
    // }

    public function isiRaport($id, $siswa)
    {
        $DataSiswa = DataSiswa::with([
            'kelas:kelas_id,kelas_nama'
        ])
            ->where('siswa_nis', $siswa)
            ->select('siswa_id', 'siswa_nama', 'siswa_nis', 'siswa_nisn', 'siswa_alamat', 'siswa_kelas_id')
            ->first();

        $dataTa = TahunAjaran::where('id_ta', $id)->first();
        $pelajaran = dataPelajaran::with('mapel')->where('id_kelas', $DataSiswa['siswa_kelas_id'])->get();

        // Cek apakah raport sudah ada
        $raport = DataRaport::where('id_ta', $id)
            ->where('siswa_nis', $siswa)
            ->first();


        // Jika raport ada, decode JSON
        $data_nilai = $raport ? json_decode($raport->data_nilai, true) : [];

        return view('admin/isiRaport', [
            'title' => 'Isi Raport Siswa',
            'siswa' => $DataSiswa,
            'id_ta' => $id,
            'mapel' => $pelajaran,
            'dataTa' => $dataTa,
            'data_nilai' => $data_nilai // Kirim data ke Blade
        ]);
    }

    public function simpanRaport(Request $request)
    {
        // Ambil semua data dari request, kecuali idTa dan siswa-nis
        $data = $request->except(['idTa', 'siswa-nis', '_token']);

        // Struktur data yang akan disimpan
        $dataPost = [
            'id_ta' => $request->input('idTa'),
            'siswa_nis' => $request->input('siswa-nis'),
            'data_nilai' => json_encode($data),
        ];

        // Panggil method di Model
        DataRaport::simpanRaport($dataPost);

        return redirect()->back()->with('success', 'Data raport berhasil disimpan!');
    }
}
