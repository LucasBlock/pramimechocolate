<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $fillable = [
        'pedido_id',
        'produto_id',
        'quantidade',
    ];

    public $timestamps = false;

    protected $dates = [
        'data_entrega',
        'data_pedido'

    ];

    protected $with = [
        'produto',
    ];


    public function produto()
    {
        return $this->belongsTo('App\Produto', 'produto_id');
    }
}
