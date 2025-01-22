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
        Schema::create('tbl_pelajaran', function (Blueprint $table) {
            $table->integer('id_pelajaran', true);
            $table->integer('id_kelas');
            $table->integer('kd_mapel');
            $table->integer('kd_pengajar')->nullable();
            $table->integer('kd_sg')->nullable()->default(11);
            $table->string('link_oc');
            $table->date('tgl_oc')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->tinyInteger('aktifkan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pelajaran');
    }
};
