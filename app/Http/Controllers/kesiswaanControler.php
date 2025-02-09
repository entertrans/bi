<?php

namespace App\Http\Controllers;

use App\Models\dataSiswa;
use Illuminate\Http\Request;

class kesiswaanControler extends Controller
{
    public function Siswa()
    {
        //  // Menggunakan dd() untuk dump dan die data
        //  dd($dataSiswa['0']['siswa_nama']);
        $dataSiswa = dataSiswa::with(['agama', 'kelas', 'satelit1']) // Eager loading relasi
            ->where(function ($query) {
                $query->where('soft_deleted', 0)
                    ->where('siswa_kelas_id', '<', 16);
            })
            ->get();
        // $siswa = dataSiswa::with(['agama', 'kelas'])->get();
        // dd( $dataSiswa[0]['agama']['agama_nama']);
        return view('admin/siswa', ['title' => 'Data Siswa', 'dt_siswa' => $dataSiswa]);
    }
    //
    public function editSiswa(dataSiswa $siswa)
    {
        // Ambil data siswa beserta relasi
        $siswa = dataSiswa::with(['agama', 'kelas'])->where('siswa_nis', $siswa->siswa_nis)->first();

        if (!$siswa) {
            return abort(404, 'Data siswa tidak ditemukan');
        }

        return view('admin.editsiswa', [
            'title' => 'Edit Peserta',
            'edit_pd' => $siswa,
        ]);
    }

    public function siswaKeluar()
    {
        //  dd($dataSiswa['0']['siswa_nama']);
        $dataSiswa = dataSiswa::with(['agama', 'kelas', 'satelit1']) // Eager loading relasi
            ->where(function ($query) {
                $query->where('soft_deleted', 1)
                    ->where('siswa_kelas_id', '<', 16);
            })
            ->get();
        // dd( $dataSiswa[0]['satelit1']['satelit_nama']);
        return view('admin/siswaKeluar', ['title' => 'Data Siswa Keluar', 'dt_siswa' => $dataSiswa]);
    }

    public function siswaAlumni(){
        
    //  // Menggunakan dd() untuk dump dan die data
    //  dd($dataSiswa['0']['siswa_nama']);
   $dataSiswa = dataSiswa::with(['agama', 'kelas','satelit1']) // Eager loading relasi
   ->where(function ($query) {
       $query->where('siswa_kelas_id', '>', 15);
   })
   ->get();
   // dd( $dataSiswa[0]);
   return view('admin/siswaAlumni', ['title' => 'Data Siswa Alumni', 'dt_siswa' => $dataSiswa]);
    }
}
