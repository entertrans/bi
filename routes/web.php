<?php

use App\Models\dataSiswa;
use Illuminate\Support\Arr;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaControler;
use App\Http\Controllers\eraportControler;
use App\Http\Controllers\kesiswaanControler;
use App\Http\Controllers\ApiServerController;




//route admin
Route::get('/', function () {
    return view('admin/dashboard', ['title' => 'Dashboard']);
});
Route::get('/ujicoba', function () {
    return view('ujicoba');
});
Route::get('/keuangan', function () {
    return view('admin/keuangan');
});


//menu kesiswaan
Route::get('/siswa', [kesiswaanControler::class, 'Siswa']);

Route::get('/siswaKeluar', [kesiswaanControler::class, 'siswaKeluar']);

Route::get('/siswaAlumni', [kesiswaanControler::class, 'siswaAlumni']);

Route::get('/admin/edit_pd/{siswa:siswa_nis}', [kesiswaanControler::class, 'editSiswa']);

//menu E-Raport
Route::get('/tahunAjaran', [eraportControler::class, 'Ta']);
Route::get('/admin/pilihSiswa/{id:id_ta}', [eraportControler::class, 'pilihSiswa'])->name('pilih.siswa');
Route::get('/admin/pilihSiswa/{id:id_ta}/{siswa:id_siswa}', [eraportControler::class, 'isiRaport'])->name('raport.siswa');


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
