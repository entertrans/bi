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
        Schema::create('tbl_mapel', function (Blueprint $table) {
            $table->integer('kd_mapel', true);
            $table->string('nm_mapel', 100)->nullable();
            $table->integer('status_mapel')->default(1);
            $table->string('kelompok', 1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mapel');
    }
};
