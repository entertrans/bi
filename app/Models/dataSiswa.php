<?php

namespace App\Models;

use App\Models\DataAgama;
use App\Models\NamaKelas;
use App\Models\DataSatelit;
use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    protected $table = 'tbl_siswa';  // Pastikan ini sesuai dengan nama tabel yang benar
    protected $primaryKey = 'siswa_id'; // Primary key

    // Jika ada atribut lain, misalnya:
    // protected $fillable = ['nama', 'alamat']; 
    // Relasi ke tbl_agama (One-to-Many)
    public function agama()
    {
        return $this->belongsTo(DataAgama::class, 'siswa_agama_id', 'agama_id'); 
    }

    // Relasi ke tbl_kelas (One-to-Many)
    public function kelas()
    {
        return $this->belongsTo(NamaKelas::class, 'siswa_kelas_id', 'kelas_id');
    }

    // Relasi ke tbl_satelit (One-to-Many)
    public function satelit1()
    {
        return $this->belongsTo(DataSatelit::class, 'satelit', 'satelit_id');
    }
}
