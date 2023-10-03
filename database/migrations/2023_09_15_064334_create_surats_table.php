<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis_surat', false)->index('fkIdJenis');
            $table->unsignedBigInteger('id_user', false)->index('fkIdUser');
            $table->date('tanggal_surat')->default('2023-01-01')->nullable(false);
            $table->text('ringkasan');
            $table->text('file');

            $table->foreign('id_jenis_surat')->on('jenis_surat')->references('id');
            $table->foreign('id_user')->on('tbl_user')->references('id');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};