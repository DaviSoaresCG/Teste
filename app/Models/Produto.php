<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'valor'];

    public function venda()
    {
        return $this->belongsToMany(Venda::class)
            ->withPivot(['quantidade', 'valor_unitario'])
            ->withTimestamps();
    }
}
