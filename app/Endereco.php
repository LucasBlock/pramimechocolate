<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'estado',
        'cidade',
        'bairro',
        'rua',
        'complemento',
        'nome',
        'cep',
        'user_id',
    ];
}
