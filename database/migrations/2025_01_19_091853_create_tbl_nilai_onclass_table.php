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
        Schema::create('tbl_nilai_onclass', function (Blueprint $table) {
            $table->integer('id_nilai', true);
            $table->string('user_siswa', 15);
            $table->text('id_pelajaran')->nullable();
            $table->integer('pertemuan_ke')->nullable();
            $table->text('nilai')->nullable();
            $table->longText('komen')->nullable();
            $table->longText('lampiran')->nullable();
            $table->string('tipe', 15);
            $table->date('createDate');
            $table->date('updateDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_nilai_onclass');
    }
};
