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
        Schema::create('tbl_log_aktivitas', function (Blueprint $table) {
            $table->integer('log_id', true);
            $table->text('log_nama')->nullable();
            $table->timestamp('log_tanggal')->nullable()->useCurrent();
            $table->string('log_ip', 20)->nullable();
            $table->integer('log_pengguna_id')->nullable()->index('log_pengguna_id');
            $table->binary('log_icon')->nullable();
            $table->string('log_jenis_icon', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_log_aktivitas');
    }
};
