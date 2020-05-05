<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Produto</title>

    </head>
    <body>
        <h1>Produto</h1>

        <button> <a href="/produtos"> Voltar </a> </button>
        <h2>{{$produto->nome}}</h2>
        <h2>{{$produto->preco}}</h2>
        <h2>{{$produto->categoria_id}}</h2>
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
