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
        'categoria',
        'imagens',
    ];


    public function imagens()
    {
        return $this->hasMany(Imagem::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
