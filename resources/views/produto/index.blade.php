@extends('dashboard')
@section('content')
        <div class="list">
            <h1>Produtos</h1>
            <div>
                <a class="btn btn-primary" title="Novo" href="{{route('produtos.novo')}}">
                    <span class="material-icons">
                        add
                    </span>
                </a>
            </div>
        </div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->preco}}</td>
                        <td>{{$produto->categoria->nome}}</td>
                        <td>
                            <a href="{{route('produtos.editar', $produto->id)}}" title="Editar">
                                <span class="material-icons">edit</span>
                            </a>
                            <a href="{{route('produtos.deletar', $produto->id)}}" title="Excluir">
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
