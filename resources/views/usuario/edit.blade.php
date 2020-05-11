@extends('dashboard')
@section('content')
    <div class="list">
        <h1>Editar Cliente</h1>

        <a href="{{route('clientes')}}">
            <span class="material-icons">
                undo
            </span>
        </a>
    </div>
    <form method="POST" id="form" action="{{route('clientes.atualizar', $cliente->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
            </div>
            <input name="name" max="255" value="{{$cliente->name}}" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            </div>
            <input name="email" max="255" value="{{$cliente->email}}" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Cidade</span>
            </div>
            <input name="cidade" max="255" value="@if(isset($cliente->endereco)) {{$cliente->endereco->cidade}} @endif" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Bairro</span>
            </div>
            <input name="bairro" max="255" value="@if(isset($cliente->endereco)) {{$cliente->endereco->bairro}} @endif" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Rua</span>
            </div>
            <input name="rua" max="255" value="@if(isset($cliente->endereco)) {{$cliente->endereco->rua}} @endif" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Número</span>
            </div>
            <input name="numero" max="255" value="@if(isset($cliente->endereco)) {{$cliente->endereco->numero}} @endif" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <button type="submit">Enviar</button>
    </form>
    <style>
        #form {
            display:flex;
            flex-direction: column;
            background-color: #fafafa;
        }

        #form button {
            margin-left: 10px;
        }

        .list {
            display: flex;
            justify-content: space-between;
        }
    </style>
@endsection
