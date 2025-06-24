<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['cliente_id', 'total', 'data_venda', 'funcionario_id'];
    public function produtos()
    {
        return $this->belongsToMany(Produto::class)
        ->withPivot(['quantidade', 'valor'])
        ->withTimestamps();
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
