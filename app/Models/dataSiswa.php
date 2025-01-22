<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    protected $table = 'tbl_siswa';  // Pastikan ini sesuai dengan nama tabel yang benar
    protected $primaryKey = 'siswa_id'; // Primary key

    // Jika ada atribut lain, misalnya:
    // protected $fillable = ['nama', 'alamat']; 
}
