<?php

namespace App\Http\Controllers;

use App\Models\NamaKelas;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    //

    public function pilihSiswa()
    {
        $dataKelas = NamaKelas::where('kelas_id', '<', 16)->get();
        // dd($dataKelas);
        return view('admin/DaftarSiswa', [
            'title' => 'Data Siswa',
            'kelas' => $dataKelas
        ]);
    }
}
