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
        Schema::create('tbl_nilai', function (Blueprint $table) {
            $table->integer('id_nilai', true);
            $table->string('nis_siswa', 50);
            $table->integer('kd_mapel');
            $table->integer('nilai');
            $table->integer('kelas_id')->nullable();
            $table->string('ta', 25);
            $table->integer('semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_nilai');
    }
};
