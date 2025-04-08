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
        Schema::create('table_petugas_kader', function (Blueprint $table) {
            $table->id('id_petugas_kader');
            $table->string('nama_petugas');
            $table->integer('nomor_petugas');
            $table->string('alamat_petugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_petugas_kader');
    }
};