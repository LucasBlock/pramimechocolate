<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'data_pedido',
        'data_entrega',
        'valor',
        'status',
        'user_id',
        'endereco_id',
    ];

}
