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
        Schema::create('tbl_log_forum', function (Blueprint $table) {
            $table->integer('id_log', true);
            $table->string('nisn_siswa', 15);
            $table->integer('id_forum');
            $table->text('log_forum')->nullable();
            $table->text('log_tugas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_log_forum');
    }
};
