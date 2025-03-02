<?php

namespace App\Models;

use App\Models\DataInvoice;
use App\Models\DataTagihan;
use App\Models\DataPembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $table = 'tbl_invoice_detail';
    protected $primaryKey = 'id_detail';
    public $incrementing = true;
    public $timestamps = false; // Matikan timestamps
    protected $fillable = [
        'id_invoice',
        'siswa_nis',
        'tagihan'
    ];

    public function invoice()
    {
        return $this->belongsTo(DataInvoice::class, 'id_invoice', 'id_invoice');
    }
    // Custom accessor untuk parsing JSON + join ke tbl_tagihan
    public function getTagihanDetailAttribute()
    {
        $tagihan = json_decode($this->tagihan, true); // Decode JSON

        if (!$tagihan) return [];

        // Ambil semua id_tagihan
        $tagihanIds = array_column($tagihan, 'id_tagihan');

        // Query 1x saja, ambil semua tagihan
        $dataTagihan = DataTagihan::whereIn('id_tagihan', $tagihanIds)->get()->keyBy('id_tagihan');

        // Gabungkan data tagihan JSON dengan data dari tabel
        foreach ($tagihan as &$t) {
            $t['jns_tagihan'] = $dataTagihan[$t['id_tagihan']]->jns_tagihan ?? 'Tidak ditemukan';
            $t['nom_tagihan'] = $dataTagihan[$t['id_tagihan']]->nom_tagihan ?? 0;
        }

        return $tagihan;
    }

     public function totalPembayaran($nis)
     {
         return DataPembayaran::where('siswa_nis', $nis)
                              ->where('id_invoice', $this->id_invoice) // Filter berdasarkan id_invoice
                              ->sum('nom_pembayaran') ?? 0; // Menghitung total pembayaran
     }
}
