<?php

namespace App\Models;

use App\Models\InvoiceDetail;
use App\Models\DataPembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataInvoice extends Model
{
    use HasFactory;

    protected $table = 'tbl_invoice';
    protected $primaryKey = 'id_invoice';
    public $incrementing = true;
    public $timestamps = false; // Matikan timestamps

    protected $fillable = [
        'kd_invoice',
        'nm_invoice',
        'tgl_invoice',
        'jt_invoice',
        'total_invoice',
        'potongan',
        'total_bayar'
    ];

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class, 'id_invoice', 'id_invoice');
    }
}
