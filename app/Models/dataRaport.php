<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataRaport extends Model
{
    use HasFactory;

    protected $table = 'tbl_nilai'; // Nama tabel di database
    protected $primaryKey = 'idnilai'; // Nama primary key

    protected $fillable = ['id_ta', 'siswa_nis', 'data_nilai'];

    public $timestamps = false; // Nonaktifkan timestamps

    public static function simpanRaport($dataPost)
    {
        return self::updateOrCreate(
            [
                'id_ta' => $dataPost['id_ta'],
                'siswa_nis' => $dataPost['siswa_nis'],
            ],
            [
                'data_nilai' => $dataPost['data_nilai'],
                'updated_at' => now()
            ]
        );
    }
}
