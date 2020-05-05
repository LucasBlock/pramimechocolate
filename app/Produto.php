<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'preco',
        'categoria_id',
    ];

    protected $with = [
        'categoria'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
