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
        Schema::create('tbl_kisikisi', function (Blueprint $table) {
            $table->integer('kisikisi_id', true);
            $table->string('kisikisi_ub', 25);
            $table->text('kisikisi_deskripsi');
            $table->integer('kisikisi_mapel')->nullable();
            $table->integer('kisikisi_kelas_id');
            $table->integer('kisikisi_semester')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kisikisi');
    }
};
