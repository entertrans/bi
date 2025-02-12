<?php

namespace App\Http\Controllers;

use App\Models\dataMapel;
use App\Models\dataSiswa;
use App\Models\namaKelas;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;
use App\Models\dataPelajaran;
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
        $dataKelas = namaKelas::where('kelas_id', '<', 16)->get();
        // dd($id);
        return view('admin/pilihSiswa', [
            'title' => 'Data Siswa',
            'kelas' => $dataKelas,
            'id_ta' => $id
        ]);
    }
    public function isiRaport($id,$siswa) {
        $dataSiswa = dataSiswa::with([
            'kelas:kelas_id,kelas_nama'
        ])
        ->where('siswa_nis', $siswa)
        ->select('siswa_id', 'siswa_nama', 'siswa_nis', 'siswa_nisn', 'siswa_alamat', 'siswa_kelas_id') // Tambahkan ini
        ->first();
        $dataTa = TahunAjaran::where('id_ta', $id)->first(); 
        $pelajaran = dataPelajaran::with('mapel') ->where('id_kelas', $dataSiswa['siswa_kelas_id'])->get();
        // dd($pelajaran);
        return view('admin/isiRaport', [
            'title' => 'isi Raport Siswa',
            'siswa' => $dataSiswa,
            'id_ta' => $id,
            'mapel'=>$pelajaran,
            'dataTa' => $dataTa
        ]);
        
        // dd($dataSiswa);
    }

}
