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
        Schema::create('tbl_tagihan', function (Blueprint $table) {
            $table->integer('id_tagihan', true);
            $table->string('jns_tagihan', 50);
            $table->bigInteger('nom_tagihan');
            $table->integer('sts_tagihan')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tagihan');
    }
};
