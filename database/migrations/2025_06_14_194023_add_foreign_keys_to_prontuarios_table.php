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
        Schema::table('prontuarios', function (Blueprint $table) {
            $table->foreign('animal_id')->references('id')->on('animals');
            $table->foreign('tratamento_id')->references('id')->on('tratamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prontuarios', function (Blueprint $table) {
            $table->dropForeign(['animal_id', 'tratamento_id']);
        });
    }
};
