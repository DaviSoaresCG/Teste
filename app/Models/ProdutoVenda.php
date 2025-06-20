<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoVenda extends Model
{
    protected $fillable = ['venda_id', 'produto_id', 'quantidade', 'valor_unitario'];
}
