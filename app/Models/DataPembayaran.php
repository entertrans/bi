<?php

namespace App\Models;

use App\Models\DataInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataPembayaran extends Model
{
    use HasFactory;

    protected $table = 'tbl_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $incrementing = true;
    public $timestamps = false; // Matikan timestamps

    protected $fillable = [
        'siswa_nis',
        'id_invoice',
        'tgl_pembayaran',
        'nom_pembayaran'
    ];

    // Relasi ke DataInvoice
    public function invoice()
    {
        return $this->belongsTo(DataInvoice::class, 'id_invoice', 'id_invoice');
    }
    
    public function totalPembayaran($nis)
     {
         return DataPembayaran::where('siswa_nis', $nis)
                              ->where('id_invoice', $this->id_invoice) // Filter berdasarkan id_invoice
                              ->sum('nom_pembayaran') ?? 0; // Menghitung total pembayaran
     }

    // Relasi ke Siswa (Opsional, tergantung kebutuhan)
    // public function siswa()
    // {
    //     return $this->belongsTo(DataSiswa::class, 'siswa_nis', 'nis');
    // }
}
