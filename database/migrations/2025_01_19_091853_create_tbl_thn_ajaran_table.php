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
        Schema::create('tbl_thn_ajaran', function (Blueprint $table) {
            $table->integer('id_ta', true);
            $table->string('thn_ajaran', 15)->nullable();
            $table->integer('semester')->nullable();
            $table->date('tgl_dikeluarkan')->nullable();
            $table->longText('except')->nullable();
            $table->integer('aktifkan')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_thn_ajaran');
    }
};
