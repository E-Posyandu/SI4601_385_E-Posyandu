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
        Schema::create('table_balita', function (Blueprint $table) {
            $table->id('id_balita');
            $table->string('nama_balita');
            $table->date('tanggal_lahir'); // Ganti integer dengan date
            $table->string('jenis_kelamin');
            $table->string('golongan_darah');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->unsignedBigInteger('id_orangtua');
            $table->unsignedBigInteger('id_vaksin');
            $table->unsignedBigInteger('id_vitamin');
            $table->string('username');
            $table->string('password');
            $table->char('nik_anak', 16)->unique();    // Menambahkan kolom NIK dengan batasan 16 karakter
            $table->enum('status_akun', ['approved', 'rejected', 'waiting'])->default('waiting');
            $table->foreign('id_orangtua')->references('id_orangtua')->on('table_orangtua');
            $table->foreign('id_vaksin')->references('id_vaksin')->on('table_vaksin');
            $table->foreign('id_vitamin')->references('id_vitamin')->on('table_vitamin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_balita');
    }
};
