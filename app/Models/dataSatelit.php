<?php

namespace App\Models;

use App\Models\DataSiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataSatelit extends Model
{
    use HasFactory;

    protected $table = 'tbl_satelit'; // Nama tabel

    // Relasi ke tbl_siswa (One-to-Many)
    public function siswa()
    {
        return $this->hasMany(DataSiswa::class, 'satelit', 'satelit_id');
    }
}
