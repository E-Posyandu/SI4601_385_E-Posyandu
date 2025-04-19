<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('jadwals', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kegiatan');
        $table->string('jenis_kegiatan');
        $table->date('tanggal_kegiatan');
        $table->unsignedBigInteger('id_petugasKader');
        $table->unsignedBigInteger('id_posyandu');
        $table->timestamps();
    });
}

};
