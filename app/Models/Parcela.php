<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $fillable = ['venda_id', 'numero_parcela', 'valor', 'data_vencimento'];
}
