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
        Schema::create('tbl_absensi', function (Blueprint $table) {
            $table->integer('id_absensi', true);
            $table->integer('nis_siswa');
            $table->string('ta', 25)->nullable();
            $table->integer('semester')->nullable();
            $table->integer('sakit')->nullable()->default(0);
            $table->integer('izin')->nullable()->default(0);
            $table->integer('tanpa_ket')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_absensi');
    }
};
