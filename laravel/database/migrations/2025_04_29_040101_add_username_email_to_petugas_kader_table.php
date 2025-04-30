<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('table_petugas_kader', function (Blueprint $table) {
            $table->string('username')->unique()->after('nama_petugas');
            $table->string('email')->unique()->after('username');
            $table->string('password')->after('email');
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::table('table_petugas_kader', function (Blueprint $table) {
            $table->dropColumn(['username', 'email', 'password', 'remember_token']);
        });
    }
};