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
        Schema::create('table_jadwal', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->string('nama_kegiatan');
            $table->string('jenis_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->unsignedBigInteger('id_petugas_kader');
            $table->timestamps();
            
            $table->foreign('id_petugas_kader')->references('id_petugas_kader')->on('table_petugas_kader');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_jadwal');
    }
};