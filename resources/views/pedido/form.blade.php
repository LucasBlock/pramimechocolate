@extends('dashboard')
@section('content')
    <div class="list">
        <h1>Novo Pedido</h1>

        <a href="{{route('pedidos')}}">
            <span class="material-icons">
                undo
            </span>
        </a>
    </div>
    <meta name="_token" content="{{ csrf_token() }}">
    <form method="POST" id="form" action="{{route('pedidos.salvar')}}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Cliente</span>
            </div>
            <select name="user_id" class="custom-select" id="inputGroupSelect01">
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" onclick="addItem(
                    document.querySelector('#produto_id'),
                    document.querySelector('#quantidade'),
                )" type="button">Adicionar</button>
            </div>
            <select name="produto_id" class="custom-select" id="produto_id">
                <option></option>
                @foreach($produtos as $produto)
                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                @endforeach
            </select>
            <input class="form-control" placeholder="Quantidade" required id="quantidade">
        </div>

        <table id="tableProdutos" class="estilo table table-bordered table-dark">
            <thead>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Quantidade</th>
                <th>Preço p/unidade</th>
                <th>Preço Total</th>
                <th>Ação</th>
            <thead>
        </table>
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

<style>
    .estilo {
        margin-top: 50px;
    }
</style>
<script>

    function addItem(produto, quantidade)
    {

        var hidden = document.createElement('input');
        hidden.type = "hidden",
        hidden.value = quantidade.value
        hidden.name = 'produtos['+produto.value+']';
        hidden.id = 'produto-'+produto.value;

        var form = document.querySelector('#form');
        form.appendChild(hidden);

        var tableProdutos = document.querySelector('#tableProdutos');
        $.ajax({
            type: "GET",
            url: '/produtos/'+produto.value,
            async: false,
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(data){
                var tr = document.createElement('tr');
                tr.id="produto-tr-"+produto.value;
                var td = document.createElement('td');
                td.textContent = data.nome;
                tr.appendChild(td);

                var td = document.createElement('td');
                td.textContent = data.categoria.nome;
                tr.appendChild(td);

                var td = document.createElement('td');
                td.textContent = quantidade.value;
                tr.appendChild(td);

                var td = document.createElement('td');
                td.textContent = data.preco;
                tr.appendChild(td);

                var td = document.createElement('td');
                td.textContent = "R$" + data.preco * quantidade.value;
                tr.appendChild(td);

                var td = document.createElement('td');
                td.innerHTML = '<button onclick="excluir('+produto.value+')">Excluir</button>';
                tr.appendChild(td);

                tableProdutos.appendChild(tr);
            },
        });
        $("#produto_id").val('');
        $("#quantidade").val(0);
    }

    function excluir(id)
    {
        var tag = 'produto-'+id;
        document.getElementById(tag).remove();
        tag = 'produto-tr-'+id;
        document.getElementById(tag).remove();
    }
</script>
