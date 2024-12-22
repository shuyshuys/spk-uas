<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteCascadeToAlternatifKriteriasTable extends Migration
{
    public function up()
    {
        Schema::table('alternatif_kriterias', function (Blueprint $table) {
            // Drop existing foreign key constraints
            // $table->dropForeign(['alternatif_id']);
            // $table->dropForeign(['kriteria_id']);

            // Add foreign key constraints with ON DELETE CASCADE
            $table->foreign('alternatif_id')
                ->references('id')
                ->on('alternatifs')
                ->onDelete('cascade');

            $table->foreign('kriteria_id')
                ->references('id')
                ->on('kriterias')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('alternatif_kriterias', function (Blueprint $table) {
            // Drop foreign key constraints with ON DELETE CASCADE
            // $table->dropForeign(['alternatif_id']);
            // $table->dropForeign(['kriteria_id']);

            // Add original foreign key constraints without ON DELETE CASCADE
            // $table->foreign('alternatif_id')
            //     ->references('id')
            //     ->on('alternatifs');

            // $table->foreign('kriteria_id')
            //     ->references('id')
            //     ->on('kriterias');
        });
    }
}