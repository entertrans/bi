<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin/dashboard',['title'=>'Dashboard']);
});
Route::get('/keuangan', function () {
    return view('admin/keuangan');
});
Route::get('/siswa', function () {
    return view('admin/siswa',['title'=>'Data Siswa']);
});
