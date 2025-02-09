<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tahunAjaran extends Model
{
    //load tabel tahun ajaran
    protected $table = 'tbl_thn_ajaran';
    // Fungsi untuk mengambil data dengan urutan terbaru dulu (descending)
    public static function getAllDesc()
    {
        return self::orderBy('thn_ajaran', 'desc')
        ->orderBy('semester', 'desc')
        ->get();
    }
}
