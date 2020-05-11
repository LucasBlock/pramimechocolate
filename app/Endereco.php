<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'cidade',
        'bairro',
        'rua',
        'numero',
        'user_id',
    ];
}
