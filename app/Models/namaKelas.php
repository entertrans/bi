<?php

namespace App\Models;

use App\Models\dataSiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class namaKelas extends Model
{
    use HasFactory;

    protected $table = 'tbl_kelas'; // Nama tabel

    // Relasi ke tbl_siswa (One-to-Many)
    public function siswa()
    {
        return $this->hasMany(dataSiswa::class, 'siswa_kelas_id', 'kelas_id');
    }
}
