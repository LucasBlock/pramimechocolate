<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagens';

    protected $fillable = [
        'url',
        'produto_id',
    ];
}
