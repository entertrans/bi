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
        Schema::create('tbl_materi_tugas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_forum');
            $table->integer('pertemuan');
            $table->string('judul_materi', 100);
            $table->string('jns_materi', 25);
            $table->text('isi_materi');
            $table->longText('lampiran')->nullable();
            $table->dateTime('createDate')->useCurrent();
            $table->date('endDate')->nullable();
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_materi_tugas');
    }
};
