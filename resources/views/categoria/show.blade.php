<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nova categoria</title>

    </head>
    <body>
        <h1>Categoria</h1>

        <button> <a href="/categorias"> Voltar </a> </button>
        <h2>{{$categoria->nome}}</h2>
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
