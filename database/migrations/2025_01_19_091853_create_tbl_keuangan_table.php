<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_keuangan', function (Blueprint $table) {
            $table->integer('kd_tagihan');
            $table->integer('nom_pembayaran');
            $table->date('tgl_pembayaran')->nullable();
            $table->string('nis_siswa', 50);
            $table->string('kd_transaksi', 50)->unique('kd_transaksi')->comment('kode+ymdis');
            $table->string('status', 50);

            $table->primary(['kd_transaksi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_keuangan');
    }
};
