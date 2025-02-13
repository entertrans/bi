<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Siswa()
    {
        //  // Menggunakan dd() untuk dump dan die data
        //  dd($DataSiswa['0']['siswa_nama']);
        $DataSiswa = DataSiswa::with(['agama', 'kelas', 'satelit1']) // Eager loading relasi
            ->where(function ($query) {
                $query->where('soft_deleted', 0)
                    ->where('siswa_kelas_id', '<', 16);
            })
            ->get();
        // $siswa = DataSiswa::with(['agama', 'kelas'])->get();
        // dd( $DataSiswa[0]['agama']['agama_nama']);
        return view('admin/siswa', ['title' => 'Data Siswa', 'dt_siswa' => $DataSiswa]);
    }
    //
    public function editSiswa(DataSiswa $siswa)
    {
        // Ambil data siswa beserta relasi
        $siswa = DataSiswa::with(['agama', 'kelas'])->where('siswa_nis', $siswa->siswa_nis)->first();

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
        //  dd($DataSiswa['0']['siswa_nama']);
        $DataSiswa = DataSiswa::with(['agama', 'kelas', 'satelit1']) // Eager loading relasi
            ->where(function ($query) {
                $query->where('soft_deleted', 1)
                    ->where('siswa_kelas_id', '<', 16);
            })
            ->get();
        // dd( $DataSiswa[0]['satelit1']['satelit_nama']);
        return view('admin/siswaKeluar', ['title' => 'Data Siswa Keluar', 'dt_siswa' => $DataSiswa]);
    }

    public function siswaAlumni(){
        
    //  // Menggunakan dd() untuk dump dan die data
    //  dd($DataSiswa['0']['siswa_nama']);
   $DataSiswa = DataSiswa::with(['agama', 'kelas','satelit1']) // Eager loading relasi
   ->where(function ($query) {
       $query->where('siswa_kelas_id', '>', 15);
   })
   ->get();
   // dd( $DataSiswa[0]);
   return view('admin/siswaAlumni', ['title' => 'Data Siswa Alumni', 'dt_siswa' => $DataSiswa]);
    }
}
