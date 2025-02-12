<?php

namespace App\Models;

use App\Models\dataMapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'tbl_pelajaran'; // Nama tabel
    protected $primaryKey = 'id_pelajaran'; // Pastikan primary key sudah benar
    public $timestamps = false; // Kalau tidak ada created_at & updated_at

    public function mapel()
    {
        return $this->belongsTo(dataMapel::class, 'kd_mapel', 'kd_mapel');
    }
}
