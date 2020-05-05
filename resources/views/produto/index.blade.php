<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nova produto</title>

    </head>
    <body>
        <h1>produto</h1>
        <button>
            <a href="/produtos/novo">Novo</a>
        </button>
        <table>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->preco}}</td>
                        <td>{{$produto->categoria->nome}}</td>
                        <td>
                            <a href="/produtos/{{$produto->id}}">Visualizar</a>
                            <a href="/produtos/{{$produto->id}}/editar">Editar</a>
                            <a href="/produtos/{{$produto->id}}/delete">Excluir</a>
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
