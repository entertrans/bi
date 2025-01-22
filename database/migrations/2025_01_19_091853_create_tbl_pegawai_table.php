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
        Schema::create('tbl_pegawai', function (Blueprint $table) {
            $table->integer('pegawai_id', true);
            $table->string('pegawai_nip', 30)->nullable();
            $table->string('pegawai_nama', 70)->nullable();
            $table->string('pegawai_jenkel', 2)->nullable();
            $table->string('pegawai_tmp_lahir', 80)->nullable();
            $table->date('pegawai_tgl_lahir')->nullable();
            $table->string('pegawai_bagian', 120)->nullable();
            $table->string('pegawai_photo', 40)->nullable();
            $table->timestamp('pegawai_tgl_input')->nullable()->useCurrent();
            $table->boolean('soft_deleted');
            $table->string('pegawai_file', 200)->nullable();
            $table->integer('lokasi_dinas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pegawai');
    }
};
