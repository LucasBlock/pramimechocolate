<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('data_pedido');
            $table->date('data_entrega');
            $table->decimal('valor_total',  8, 2);
            $table->integer('quantidade');
            $table->integer('status')->default(1); //em andamento
            $table->boolean('tipo_entrega');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('endereco_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
