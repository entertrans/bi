<?php

namespace App\Http\Controllers;

use App\Models\dataSiswa;
use App\Models\namaKelas;
use App\Models\tahunAjaran;
use Illuminate\Http\Request;
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
        
        return view('admin/pilihSiswa', [
            'title' => 'Data Siswa',
            'kelas' => $dataKelas,
            'id_ta' => $id
        ]);
    }

}
