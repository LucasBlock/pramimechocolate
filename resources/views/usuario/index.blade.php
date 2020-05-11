@extends('dashboard')
@section('content')
        <div class="list">
            <h1>Clientes</h1>
            <div>
                <a class="btn btn-primary" title="Novo" href="{{route('clientes.novo')}}">
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
                <th scope="col">Endereço</th>
                <th scope="col">Ações</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @if(isset($user->endereco->cidade))
                                {{$user->endereco->cidade}}
                            @endif
                            -
                            @if(isset($user->endereco->bairro))
                                {{$user->endereco->bairro}}
                            @endif
                            -
                            @if(isset($user->endereco->rua))
                                {{$user->endereco->rua}}
                            @endif
                        </td>
                        <td>
                            <a href="{{route('clientes.editar', $user->id)}}" title="Editar">
                                <span class="material-icons">edit</span>
                            </a>
                            <a href="{{route('clientes.deletar', $user->id)}}" title="Excluir">
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
