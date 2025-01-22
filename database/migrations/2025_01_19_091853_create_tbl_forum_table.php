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
        Schema::create('tbl_forum', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('fr_id_pelajaran');
            $table->dateTime('createDate')->useCurrent();
            $table->integer('isDelete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_forum');
    }
};
