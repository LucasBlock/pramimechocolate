<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nova categoria</title>

    </head>
    <body>
        <h1>Categoria</h1>
        <button>
            <a href="/categorias/novo">Novo</a>
        </button>
        <table>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nome}}</td>
                        <td>
                            <a href="/categorias/{{$categoria->id}}">Visualizar</a>
                            <a href="/categorias/{{$categoria->id}}/editar">Editar</a>
                            <a href="/categorias/{{$categoria->id}}/delete">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
