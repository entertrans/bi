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
        Schema::create('tbl_lembaga', function (Blueprint $table) {
            $table->integer('id_lembaga', true);
            $table->string('nm_lembaga', 25);
            $table->text('almt');
            $table->string('notelp', 25);
            $table->integer('kode_pos');
            $table->string('kel', 25);
            $table->string('kec', 25);
            $table->string('kab', 25);
            $table->string('prov', 25);
            $table->string('website', 25);
            $table->string('nm_yayasan', 25);
            $table->string('npsn');
            $table->string('no_ijin');
            $table->string('kepsek', 25)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_lembaga');
    }
};
