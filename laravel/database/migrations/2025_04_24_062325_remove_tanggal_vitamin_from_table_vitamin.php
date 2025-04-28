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
        Schema::table('table_vitamin', function (Blueprint $table) {
            $table->dropColumn('tanggal_vitamin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_vitamin', function (Blueprint $table) {
            $table->date('tanggal_vitamin')->nullable(); // tambahkan kembali kalau di-rollback
        });
    }
};
