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
        Schema::create('tbl_abs_oc', function (Blueprint $table) {
            $table->integer('id_oc', true);
            $table->integer('id_pelajaran')->nullable();
            $table->longText('dt_oc')->nullable();
            $table->longText('dt_kc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_abs_oc');
    }
};
