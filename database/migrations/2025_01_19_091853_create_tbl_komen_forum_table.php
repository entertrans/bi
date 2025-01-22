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
        Schema::create('tbl_komen_forum', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_forum')->nullable();
            $table->integer('id_reply')->nullable();
            $table->integer('pertemuan')->nullable();
            $table->string('user_komen', 50)->nullable();
            $table->integer('reply_to')->nullable();
            $table->string('mention', 15)->nullable();
            $table->longText('lampiran')->nullable();
            $table->longText('isi_komen');
            $table->dateTime('createDate')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_komen_forum');
    }
};
