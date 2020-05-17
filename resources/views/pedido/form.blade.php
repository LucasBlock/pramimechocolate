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
            <select class="custom-select" id="produto_id">
                <option></option>
                @foreach($produtos as $produto)
                    <option id="produto-opt-{{$produto->id}}" value="{{$produto->id}}">{{$produto->nome}}</option>
                @endforeach
            </select>
            <input class="form-control" placeholder="Quantidade" required id="quantidade" value="0">
        </div>

        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Data do pedido</span>
            </div>
            <input name="data_pedido" max="255" required type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Data da entrega</span>
            </div>
            <input name="data_entrega" max="255" required type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Quantidade</span>
            </div>
            <input name="quantidade" max="255" required type="number" pattern="[0-9]" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3 form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Valor total R$</span>
            </div>
            <input name="valor_total" id="valor_total" max="255" value="0" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="custom-control custom-switch">
            <input type="checkbox" name="tipo_entrega" value="1" class="custom-control-input" id="customSwitches">
            <label class="custom-control-label" for="customSwitches">Entregar no endereço cadastrado</label>
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
        <button type="submit">Salvar</button>
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
        hidden.classList.add('produto');
        hidden.setAttribute('produto', produto.value);

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

                var valor_total = document.querySelector('#valor_total');
                valor_total.value = parseInt(valor_total.value) + (data.preco * quantidade.value);


                tr.appendChild(td);

                var td = document.createElement('td');
                td.innerHTML = '<a type="button" title="Excluir" onclick="excluir('+produto.value+')"><span class="material-icons">delete</span><a>';
                tr.appendChild(td);

                tableProdutos.appendChild(tr);
            },
        });
        $("#produto-opt-"+produto.value).attr('style', 'display:none');
        $("#quantidade").val(0);
        $("#produto_id").val('');

    }

    function excluir(id)
    {

        var tag = 'produto-'+id;
        let produto = document.getElementById(tag);
        $('#produto-opt-'+id).removeAttr('style');
        $.ajax({
            type: "GET",
            url: '/produtos/'+produto.getAttribute('produto'),
            async: false,
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(data){
                let valor_total = document.querySelector('#valor_total');
                let produto = document.getElementById(tag);

                valor_total.value = parseInt(valor_total.value) - (parseInt(data.preco) * parseInt(produto.value));
            }
        });

        produto.remove();

        tag = 'produto-tr-'+id;
        document.getElementById(tag).remove();
    }
</script>
