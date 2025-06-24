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
        Schema::create('produto_venda', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('venda_id')->constrained()->onDelete('cascade');
            $table->foreignId('produto_id')->constrained()->onDelete('cascade');
            $table->integer('quantidade');
            $table->decimal('valor_unitario', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venda_produto');
        
        Schema::table('itens_vendas', function(Blueprint $table){
            $table->dropConstrainedForeignId('venda_id');
            $table->dropConstrainedForeignId('produto_id');
        });

        
    }
};
