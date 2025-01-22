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
        Schema::create('tbl_catmur', function (Blueprint $table) {
            $table->integer('id_catmur', true);
            $table->integer('nis_siswa');
            $table->text('catatan_siswa');
            $table->string('ta', 25);
            $table->integer('semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_catmur');
    }
};
