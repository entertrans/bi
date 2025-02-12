<?php

namespace App\Models;

use App\Models\dataPelajaran;
use Illuminate\Database\Eloquent\Model;

class dataMapel extends Model
{
    protected $table = 'tbl_mapel'; // Nama tabel
    protected $primaryKey = 'kd_mapel'; // Primary key
    public $timestamps = false; // Kalau tidak ada created_at & updated_at

    public function pelajaran()
    {
        return $this->hasMany(dataPelajaran::class, 'kd_mapel', 'kd_mapel');
    }
}
