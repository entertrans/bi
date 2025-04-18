<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataTagihan extends Model
{
    use HasFactory;

    protected $table = 'tbl_tagihan'; // Nama tabel
    protected $primaryKey = 'id_tagihan'; // Primary key
    public $timestamps = false;
    public $incrementing = true;
    
    protected $fillable = ['jns_tagihan', 'nom_tagihan','status'];

}
