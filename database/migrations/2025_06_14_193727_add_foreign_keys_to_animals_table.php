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
        Schema::table('animals', function (Blueprint $table) {
            $table->foreign('raca_id')->references('id')->on('racas');
            $table->foreign('dono_id')->references('id')->on('donos');
            $table->foreign('especie_id')->references('id')->on('especies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropForeign(['raca_id', 'dono_id', 'especie_id']);
        });
    }
};
