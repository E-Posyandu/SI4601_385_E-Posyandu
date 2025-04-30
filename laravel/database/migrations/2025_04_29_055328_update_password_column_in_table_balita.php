<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePasswordColumnInTableBalita extends Migration
{
    public function up()
    {
        Schema::table('table_balita', function (Blueprint $table) {
            $table->string('password', 255)->change();
        });
    }

    public function down()
    {
        Schema::table('table_balita', function (Blueprint $table) {
            $table->string('password', 60)->change();
        });
    }
}
