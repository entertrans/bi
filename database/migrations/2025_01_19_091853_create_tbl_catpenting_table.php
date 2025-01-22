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
        Schema::create('tbl_catpenting', function (Blueprint $table) {
            $table->integer('id_catpenting', true);
            $table->string('nis_siswa');
            $table->string('ta', 25);
            $table->integer('sms')->nullable();
            $table->integer('sikap')->nullable();
            $table->integer('kegiatan')->nullable();
            $table->integer('tugas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_catpenting');
    }
};
