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
        Schema::create('tbl_pengguna', function (Blueprint $table) {
            $table->integer('pengguna_id', true);
            $table->string('pengguna_nama', 50)->nullable();
            $table->string('pengguna_username', 30)->nullable();
            $table->string('pengguna_password', 35)->nullable();
            $table->string('spil')->nullable();
            $table->integer('pengguna_status');
            $table->string('pengguna_level', 3)->nullable()->default('2');
            $table->timestamp('pengguna_register')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pengguna');
    }
};
