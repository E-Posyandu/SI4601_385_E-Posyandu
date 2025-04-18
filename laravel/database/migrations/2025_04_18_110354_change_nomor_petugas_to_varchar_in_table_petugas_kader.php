<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNomorPetugasToVarcharInTablePetugasKader extends Migration
{
    public function up()
    {
        Schema::table('table_petugas_kader', function (Blueprint $table) {
            $table->string('nomor_petugas')->change();
        });
    }

    public function down()
    {
        Schema::table('table_petugas_kader', function (Blueprint $table) {
            $table->bigInteger('nomor_petugas')->change();
        });
    }
}
