<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Funcionario extends Authenticatable
{
    protected $fillable = ['email', 'senha'];
    protected $table = 'funcionarios';
    protected $primaryKey = 'id';

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
