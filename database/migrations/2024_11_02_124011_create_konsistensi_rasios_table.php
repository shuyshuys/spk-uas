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
        Schema::create('konsistensi_rasios', function (Blueprint $table) {
            $table->id();
            $table->float('rasio_konsistensi');
            $table->foreignId('kriteria1_id');
            $table->foreignId('kriteria2_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsistensi_rasios');
    }
};
