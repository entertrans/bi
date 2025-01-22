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
        Schema::create('tbl_jadwal', function (Blueprint $table) {
            $table->integer('id_jadwal', true);
            $table->string('jdwl_title')->nullable();
            $table->date('jdwl_start')->nullable();
            $table->time('jdwl_jam_start')->nullable();
            $table->date('jdwl_end')->nullable();
            $table->time('jdwl_jam_end')->nullable();
            $table->tinyInteger('jdwl_allday')->nullable();
            $table->text('jdwl_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_jadwal');
    }
};
