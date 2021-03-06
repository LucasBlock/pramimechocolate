@extends('dashboard')
@section('content')
    <div class="list">
        <h1>Editar o Produto</h1>

        <a href="{{route('produtos')}}">
            <span class="material-icons">
                undo
            </span>
        </a>
    </div>
    <form method="POST" id="form" action="{{route('produtos.atualizar', $produto->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
            </div>
            <input value="{{$produto->nome}}"name="nome" max="255" required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input value="{{$produto->preco}}" type="text" class="form-control" name="preco" type="text" max="255" required placeholder="Preço" aria-label="">
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>
        <!-- <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="imagens[]" enctype="multipart/form-data" multiple="multiple" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Escolha os arquivos</label>
            </div>
        </div> -->

        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Categorias</label>
            </div>
            <select name="categoria_id" class="custom-select" id="inputGroupSelect01">
                @foreach($categorias as $categoria)
                    @if ($categoria->id == $produto->categoria->id)
                        <option value="{{$categoria->id}}" selected>{{$categoria->nome}}</option>
                    @else
                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="container container-images">
            @foreach($produto->imagens as $imagem)
                <img src="{{asset($imagem->url)}}" class="col-md-12 img" >
            @endforeach
        </div>
        <button class="btn btn-primary" type="submit">Enviar</button>
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

        .container-images {
            margin-bottom: 10px;
        }
        .img {
            width: 200px;
            height: 200px;
        }
    </style>
@endsection
