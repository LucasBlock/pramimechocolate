@extends('dashboard')
@section('content')
    <div class="list">
        <h1>Editar Pedido</h1>

        <a href="{{route('pedidos')}}">
            <span class="material-icons">
                undo
            </span>
        </a>
    </div>

    <div class="header">
        <p><b>Cliente: </b>{{$pedido->user->name}}<p>
        <p><b>Data do pedido: </b>{{$pedido->data_pedido}}</p>
        <p><b>Data de entrega: </b>{{$pedido->data_entrega}}</p>
        <p><b>Endereço de entrega: </b>{{$pedido->user->endereco->rua}} - {{$pedido->user->endereco->numero}}</p>
        <form class="form" method="post" action="{{route('pedidos.atualizar', $pedido->id)}}">
            @csrf
            <div class="status">
                <p><b>Status: </b></p>
                <label for="andamento">Andamento</label><input name="status" id="andamento" value="1" type="radio" @if($pedido->status == 1) checked @endif >
                <label for="pronto">Pronto</label><input name="status" id="pronto" value="2" type="radio" @if($pedido->status == 2) checked @endif>
                <label for="entregue">Entregue</label><input name="status" id="entregue" value="3" type="radio" @if($pedido->status == 3) checked @endif>
            </div>
            <div class="custom-control custom-switch">
                <input type="checkbox" name="tipo_entrega" value="1" class="custom-control-input" id="customSwitches" @if($pedido->tipo_entrega == 1) checked @endif>
                <label class="custom-control-label" for="customSwitches">Entregar no endereço cadastrado</label>
            </div>

            <button class="buttom" type="submit">Salvar</button>
        </form>
    </div>

    <table class="table table-striped">
        <thead class="thead-dark">
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço Unitário</th>
            <th scope="col">Preço Total</th>
        </thead>
        <tbody>
        @foreach($pedido_itens as $produto)
            <tr>
                <td>{{$produto->produto->nome}}</td>
                <td>{{$produto->quantidade}}</td>
                <td>R${{$produto->produto->preco}}</td>
                <td>R${{$produto->quantidade * $produto->produto->preco}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Valor total</td>
                <td>R${{$pedido->valor_total}}</td
            </tr>
        </tfoot>
    </table>
    <style>
        .list {
            display: flex;
            justify-content: space-between;
        }

        .status {
            display:flex;
        }

        .status label {
            margin-left: 10px;
        }

        .status input {
            margin: 1 15 15 1;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .buttom {
            text-align: center;
            margin-bottom: 10px;
            width: 120px;
            align-self: center;
        }
    </style>
@endsection

<style>
    .estilo {
        margin-top: 50px;
    }
</style>
