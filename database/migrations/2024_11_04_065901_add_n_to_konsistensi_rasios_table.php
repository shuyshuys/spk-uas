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
            $table->integer('n')->after('id');
            $table->dropColumn('kriteria_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konsistensi_rasios', function (Blueprint $table) {
            $table->dropColumn('n');
            $table->unsignedBigInteger('kriteria_id')->after('id');
        });
    }
};
