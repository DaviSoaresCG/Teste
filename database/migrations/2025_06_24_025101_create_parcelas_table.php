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
        Schema::create('parcelas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('numero_parcela');
            $table->foreignId('venda_id')->constrained()->onDelete('cascade');
            $table->decimal('valor', 10, 2);
            $table->date('data_vencimento');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('parcelas', function (Blueprint $table) {
            $table->dropConstrainedForeignId('venda_id');
        });

        Schema::dropIfExists('parcelas');
        
        
    }
};
