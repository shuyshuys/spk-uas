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
        Schema::table('konsistensi_rasios', function (Blueprint $table) {
            $table->string('ci')->after('kriteria_id'); // Add CI column
            $table->string('cr')->after('ci'); // Add CR column
            $table->enum('hasil', ['Konsisten', 'Tidak Konsisten'])->after('cr'); // Add enum column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konsistensi_rasios', function (Blueprint $table) {
            $table->dropColumn('ci');
            $table->dropColumn('cr');
            $table->dropColumn('hasil');
        });
    }
};