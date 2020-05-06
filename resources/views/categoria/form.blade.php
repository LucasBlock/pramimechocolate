@extends('dashboard')
@section('content')
    <div class="list">
        <h1>Nova Categoria</h1>

        <a href="{{route('categorias')}}">
            <span class="material-icons">
                undo
            </span>
        </a>
    </div>
    <form id="form" method="POST" id="form" action="{{route('categorias.salvar')}}">
        @csrf
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
            </div>
            <input name="nome" max="255" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <button type="submit">Enviar</button>
    </form>
    <style>
        #form {
            display:flex;
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
