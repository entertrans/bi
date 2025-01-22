<?php

namespace App\Http\Controllers;

use App\Models\dataSiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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
}
