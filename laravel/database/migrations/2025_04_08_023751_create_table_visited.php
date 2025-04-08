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
        Schema::create('table_visited', function (Blueprint $table) {
            $table->id('id_kunjungan');
            $table->date('tanggal_penimbangan');
            $table->date('bulan_penimbangan');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->float('lingkar_kepala');
            $table->float('lingkat_lengan');
            $table->string('status_gizi');
            $table->boolean('asi_esklusif');
            $table->unsignedBigInteger('id_balita');
            $table->unsignedBigInteger('id_posyandu');
            $table->unsignedBigInteger('id_petugas_kader');
            $table->foreign('id_balita')->references('id_balita')->on('table_balita');
            $table->foreign('id_posyandu')->references('id_posyandu')->on('table_posyandu');
            $table->foreign('id_petugas_kader')->references('id_petugas_kader')->on('table_petugas_kader');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_visited');
    }
};