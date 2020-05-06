@extends('dashboard')
@section('content')
        <div class="list">
            <h1>Categorias</h1>
            <div>
                <a class="btn btn-primary" title="Novo" href="{{route('categorias.novo')}}">
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
                <th scope="col">Ações</th>
            </thead>
            <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->nome}}</td>
                    <td>
                        <a href="{{route('categorias.editar', $categoria->id)}}" title="Editar">
                            <span class="material-icons">edit</span>
                        </a>
                        <a href="{{route('categorias.deletar', $categoria->id)}}" title="Excluir">
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
