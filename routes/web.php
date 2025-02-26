<?php

use App\Models\dataSiswa;
use Illuminate\Support\Arr;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaControler;
use App\Http\Controllers\eraportControler;
use App\Http\Controllers\kesiswaanControler;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\ApiServerController;




//route admin
Route::get('/', function () {
    return view('admin/dashboard', ['title' => 'Dashboard']);
});
Route::get('/ujicoba', function () {
    return view('ujicoba');
});
// Route::get('/keuangan', function () {
//     return view('admin/keuangan');
// });


//menu kesiswaan
Route::get('/siswa', [kesiswaanControler::class, 'Siswa']);

Route::get('/siswaKeluar', [kesiswaanControler::class, 'siswaKeluar']);

Route::get('/siswaAlumni', [kesiswaanControler::class, 'siswaAlumni']);

Route::get('/admin/edit_pd/{siswa:siswa_nis}', [kesiswaanControler::class, 'editSiswa']);

//menu E-Raport
Route::get('/tahunAjaran', [EraportControler::class, 'Ta']);
Route::get('/admin/pilihSiswa/{id:id_ta}', [EraportControler::class, 'pilihSiswa'])->name('pilih.siswa');
Route::get('/admin/pilihSiswa/{id:id_ta}/{siswa:id_siswa}', [EraportControler::class, 'isiRaport'])->name('raport.siswa');
Route::post('/simpan-raport', [EraportControler::class, 'simpanRaport'])->name('simpan.raport');
// Route::post('/simpan-raport', function (Request $request) {
//     dd($request->all()); 
// });

//menu Keuangan
Route::get('/admin/Keuangan', [KeuanganController::class, 'pilihSiswa'])->name('keuangan.siswa');
Route::get('/admin/JenisTagihan', [KeuanganController::class, 'JenisTagihan'])->name('jenis.tagihan');
Route::post('/update-tagihan/{id}', [KeuanganController::class, 'update'])->name('update-tagihan');
Route::post('/tagihan/simpan', [KeuanganController::class, 'simpan'])->name('tagihan.simpan');
// Route::get('/admin/pilihSiswa/{id:id_ta}', [eraportControler::class, 'pilihSiswa']);

//ajax datatable route

// ROUTE API untuk ambil data siswa (gunakan DataTables server-side)
// Route::get('/admin/api/get_siswa', [ApiServerController::class, 'getSiswa'])->name('api.get.siswa');
Route::get('/api/siswa', [ApiServerController::class, 'getSiswaData'])->name('api.get.siswa');


// ROUTE untuk halaman edit siswa
// Route::get('/admin/edit_pd/{siswa:siswa_nis}', [eraportControler::class, 'editSiswa']);



//end route admin

// Route::get('/admin/edit_pd/{siswa:siswa_nis}', function (dataSiswa $siswa) {
//     return view('admin/editsiswa', ['title' => 'Edit Peserta', 'edit_pd' => $siswa]);
// });
