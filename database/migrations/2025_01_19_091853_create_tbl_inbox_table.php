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
        Schema::create('tbl_inbox', function (Blueprint $table) {
            $table->integer('inbox_id', true);
            $table->string('inbox_nama', 40)->nullable()->default('Admin');
            $table->string('inbox_kontak', 20)->nullable();
            $table->text('inbox_pesan')->nullable();
            $table->timestamp('inbox_tanggal')->nullable()->useCurrent();
            $table->integer('inbox_status')->nullable()->default(1)->comment('1=Belum dilihat, 0=Telah dilihat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_inbox');
    }
};
