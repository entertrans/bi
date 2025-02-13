<?php

namespace App\Models;

use App\Models\DataMapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'tbl_pelajaran'; // Nama tabel
    protected $primaryKey = 'id_pelajaran'; // Pastikan primary key sudah benar
    public $timestamps = false; // Kalau tidak ada created_at & updated_at

    public function mapel()
    {
        return $this->belongsTo(DataMapel::class, 'kd_mapel', 'kd_mapel');
    }
}
