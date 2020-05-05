<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar produto</title>

    </head>
    <body>
        <h1>Editar Produto</h1>
        <button> <a href="/produtos"> Voltar </a> </button>
        <form id="form" method="POST" action="/produtos/{{$produto->id}}">
            @csrf
            <input name="nome" type="text" max="255" required placeholder="Nome" value={{$produto->nome}}>
            <input name="preco" type="text" max="255" required placeholder="Preço" value={{$produto->preco}}>
            <!-- <input name="imagens[]" type="text" enctype="multipart/form-data"> -->
            <select name="categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}" >{{$categoria->nome}}</option>
                @endforeach
            </select>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>

<style>
    #form {
        display:flex;
        background-color: #fafafa;
    }

    #form button {
        margin-left: 10px;
    }


</style>
