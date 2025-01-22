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
        Schema::create('tbl_pembayaran', function (Blueprint $table) {
            $table->integer('id_pembayaran', true);
            $table->string('nis_siswa', 50);
            $table->integer('jns_tagihan');
            $table->date('tgl_jatuh_tempo');
            $table->date('tgl_pembayaran')->nullable();
            $table->bigInteger('sisa_angsur');
            $table->bigInteger('total_tagihan');
            $table->bigInteger('jml_pembayaran');
            $table->text('ket_pembayaran')->nullable();
            $table->integer('sts_pembayaran')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pembayaran');
    }
};
