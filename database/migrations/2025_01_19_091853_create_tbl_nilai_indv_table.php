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
        Schema::create('tbl_nilai_indv', function (Blueprint $table) {
            $table->integer('id_nilai_indv', true);
            $table->string('nis_siswa', 50);
            $table->string('kegiatan', 25)->nullable();
            $table->integer('nilai')->nullable();
            $table->string('ta', 25)->nullable();
            $table->integer('semester')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_nilai_indv');
    }
};
