<?php

use App\Models\dataSiswa;
use Illuminate\Support\Arr;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin/dashboard', ['title' => 'Dashboard']);
});
Route::get('/ujicoba', function () {
    return view('ujicoba');
});
Route::get('/keuangan', function () {
    return view('admin/keuangan');
});
Route::get('/siswa', function () {
    //  // Mengambil semua data dari tabel tbl_siswa
    //  $dataSiswa = DataSiswa::all();

    //  // Menggunakan dd() untuk dump dan die data
    //  dd($dataSiswa['0']['siswa_nama']);
    $dataSiswa = dataSiswa::where(function ($query) {
        $query->where('soft_deleted', 0)
            ->where('siswa_kelas_id', '<', 16);
    })->get();
    return view('admin/siswa', ['title' => 'Data Siswa', 'dt_siswa' => $dataSiswa]);
});

Route::get('/admin/edit_pd/{siswa:siswa_nis}', function (dataSiswa $siswa) {
    return view('admin/editsiswa', ['title' => 'Edit Peserta', 'edit_pd' => $siswa]);
});
