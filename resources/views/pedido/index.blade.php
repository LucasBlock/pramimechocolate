@extends('dashboard')
@section('content')
        <div class="list">
            <h1>Pedidos</h1>
            <div>
                <a class="btn btn-primary" title="Novo" href="{{route('pedidos.novo')}}">
                    <span class="material-icons">
                        add
                    </span>
                </a>
            </div>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Entregar no endereço</th>
                <th scope="col">Data do pedido</th>
                <th scope="col">Data de entrega</th>
                <th scope="col">Valor total</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </thead>
            <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->user->name}}</td>
                        <td>
                            <span class="material-icons">
                            @if($pedido->tipo_entrega == 1)
                                done
                            @else
                                clear
                            @endif
                            </span>
                        </td>
                        <td>{{$pedido->data_pedido}}</td>
                        <td>{{$pedido->data_entrega}}</td>
                        <td>R${{$pedido->valor_total}}</td>
                        <td>
                            @if ($pedido->status == 1)
                                Em andamento
                            @elseif($pedido->status == 2)
                                Pronto
                            @else
                                Entregue
                            @endif
                        </td>
                        <td>
                            <a href="{{route('pedidos.editar', $pedido->id)}}" title="Editar">
                                <span class="material-icons">edit</span>
                            </a>
                            <a href="{{route('pedidos.deletar', $pedido->id)}}" title="Excluir">
                                <span class="material-icons">delete</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
<style>
    #form {
        display:flex;
        background-color: #fafafa;
    }

    #form button {
        margin-left: 10px;
    }

    .list {
        display:flex;
        justify-content: space-between;
    }

    thead th {
        text-align: center;

    }
    tbody td{
        text-align: center;

    }
</style>
@endsection
