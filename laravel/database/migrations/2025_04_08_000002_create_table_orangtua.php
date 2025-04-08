<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_orangtua', function (Blueprint $table) {
            $table->id('id_orangtua');
            $table->string('nama_orangtua');
            $table->string('nik_orangtua');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_orangtua');
    }
};