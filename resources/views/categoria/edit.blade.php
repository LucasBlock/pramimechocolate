<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar categoria</title>

    </head>
    <body>
        <h1>Editar Categoria</h1>
        <button> <a href="/categorias"> Voltar </a> </button>
        <form id="form" method="POST" action="/categorias">
            @csrf
            <input name="nome" type="text" max="255" required value={{$categoria->nome}}>
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
