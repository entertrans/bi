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
        Schema::create('tbl_orangtua', function (Blueprint $table) {
            $table->integer('ortu_id', true);
            $table->char('siswa_nis');
            $table->string('ayah_nama')->nullable();
            $table->string('ayah_nik')->nullable();
            $table->string('ayah_tempat', 50)->nullable();
            $table->date('ayah_tanggal')->nullable();
            $table->string('ayah_pendidikan', 30)->nullable();
            $table->string('ayah_pekerjaan', 30)->nullable();
            $table->integer('ayah_penghasilan')->nullable();
            $table->string('no_telp_ayah', 25);
            $table->string('email_ayah');
            $table->string('ibu_nama')->nullable();
            $table->string('ibu_nik')->nullable();
            $table->string('ibu_tempat', 30)->nullable();
            $table->date('ibu_tanggal')->nullable();
            $table->string('ibu_pendidikan', 25)->nullable();
            $table->string('ibu_pekerjaan', 25)->nullable();
            $table->integer('ibu_penghasilan')->nullable();
            $table->string('no_telp_ibu', 25);
            $table->string('email_ibu');
            $table->string('wali_nama', 30)->nullable();
            $table->string('wali_nik')->nullable();
            $table->string('wali_tempat', 30)->nullable();
            $table->date('wali_tanggal')->nullable();
            $table->string('wali_pendidikan', 35)->nullable();
            $table->string('wali_pekerjaan', 30)->nullable();
            $table->string('wali_penghasilan', 25)->nullable();
            $table->text('wali_alamat')->nullable();
            $table->string('wali_notelp', 25)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_orangtua');
    }
};
