<?php

namespace App\Http\Controllers;

use App\Models\dataSiswa;
use Illuminate\Http\Request;

class siswaControler extends Controller
{
    // Mengambil data siswa berdasarkan kelas (API)
    public function getSiswaByKelas($kelas_id)
    {
        $siswa = dataSiswa::where('siswa_kelas_id', $kelas_id)->where('soft_deleted', 0)->get();
        if ($siswa->isEmpty()) {
            return response()->json([]); // Return array kosong jika tidak ada data
        }
        return response()->json($siswa);
    }
    
}
