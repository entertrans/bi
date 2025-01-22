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
        Schema::create('tbl_siswa', function (Blueprint $table) {
            $table->integer('siswa_id', true);
            $table->char('siswa_nis')->nullable()->unique('siswa_nis');
            $table->string('siswa_nisn')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->string('nik_siswa')->default('0000000000000000');
            $table->string('siswa_nama', 100)->nullable();
            $table->string('siswa_jenkel', 2)->nullable();
            $table->string('siswa_tempat', 125)->nullable();
            $table->date('siswa_tgl_lahir');
            $table->integer('siswa_agama_id');
            $table->string('siswa_kewarganegaraan', 3)->nullable();
            $table->string('siswa_alamat')->nullable();
            $table->string('siswa_email', 125)->nullable();
            $table->text('siswa_dokumen')->nullable();
            $table->string('siswa_no_telp', 25)->nullable();
            $table->integer('siswa_kelas_id')->nullable();
            $table->string('siswa_photo', 500)->nullable();
            $table->boolean('soft_deleted')->default(false);
            $table->integer('anak_ke')->nullable();
            $table->string('sekolah_asal', 125)->nullable();
            $table->integer('satelit')->nullable();
            $table->tinyInteger('oc')->default(0);
            $table->tinyInteger('kc')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_siswa');
    }
};
