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
        Schema::create('tbl_satelit', function (Blueprint $table) {
            $table->integer('satelit_id', true);
            $table->string('satelit_nama', 25)->nullable();
            $table->text('satelit_alamat')->nullable();
            $table->string('satelit_pic')->nullable();
            $table->string('satelit_notelp')->nullable();
            $table->string('satelit_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_satelit');
    }
};
