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
        Schema::create('table_report_perkembangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_balita'); 
            $table->date('tanggal');
            $table->string('file_path'); 
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_balita')->references('id_balita')->on('table_balita')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_report_perkembangan');
    }
};
