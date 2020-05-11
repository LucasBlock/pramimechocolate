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
                <th scope="col">Valor</th>
                <th scope="col">Ações</th>
            </thead>
            <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->cliente->nome}}</td>
                        <td>{{$pedido->valor_total}}</td>
                        <td>
                            <a href="#" title="Editar">
                                <span class="material-icons">edit</span>
                            </a>
                            <a href="{{route('pedidos.editar', 1)}}" title="Editar">
                                <span class="material-icons">edit</span>
                            </a>
                            <a href="{{route('pedidos.deletar', 1)}}" title="Excluir">
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

</style>
@endsection
