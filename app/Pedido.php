<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pedido extends Model
{
    protected $fillable = [
        'data_pedido',
        'data_entrega',
        'valor_total',
        'status',
        'user_id',
        'endereco_id',
        'quantidade',
        'tipo_entrega',
    ];

    protected $with = [
        'user',
    ];

    public function getDataPedidoAttribute()
    {
        return Carbon::parse($this->attributes['data_pedido'])->format('d/m/Y');
    }

    public function getDataEntregaAttribute()
    {
        return Carbon::parse($this->attributes['data_entrega'])->format('d/m/Y');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
