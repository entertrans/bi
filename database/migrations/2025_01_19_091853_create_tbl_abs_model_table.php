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
        Schema::create('tbl_abs_model', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('siswa_nis', 25);
            $table->longText('fr_abs')->nullable();
            $table->longText('tgs_abs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_abs_model');
    }
};
