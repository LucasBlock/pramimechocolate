<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\User;
use App\Produto;
use App\PedidoItem;
use App\Endereco;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();

        return view('pedido.index', compact(['pedidos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = User::all()
                        ->where('admin', 0);

        $produtos = Produto::all();
        return view('pedido.form',
                    compact([
                        'clientes',
                        'produtos',
                    ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($request->produtos)){
            return redirect()->route('pedidos.novo')->with('error','Adicione algum produto');
        }
        $endereco = Endereco::where('user_id', $request->user_id)->get()->first();

        $pedido = new Pedido();
        $pedido->fill($request->all());

        $pedido->endereco_id = $endereco->id;
        $pedido->status = 1;

        $pedido->tipo_entrega = isset($request->tipo_entrega) ? true : false;

        $pedido->save();

        foreach($request->produtos as $k => $v){
            $pedido_item = new PedidoItem();
            $pedido_item->fill(['produto_id' => $k, 'pedido_id' => $pedido->id, 'quantidade' => $v]);
            $pedido_item->save();
        }

        return redirect()->route('pedidos')->with('success', 'Pedido criado com sucesso!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return redirect()->routes('pedidos')->with('error', 'Pedido não encontrado');
        }

        $pedido_itens = PedidoItem::where('pedido_id', $id)
                                    ->get();

        return view('pedido.edit', compact(['pedido', 'pedido_itens']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return redirect()->route('pedidos')->with('error', 'Pedido não encontrado');
        }

        $pedido->fill($request->all());
        if (!isset($request->tipo_entrega)){
            $pedido->tipo_entrega = 0;
        }
        $pedido->save();

        return redirect()->route('pedidos')->with('success', 'Pedido atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return redirect()->route('pedidos')->with('error', 'Pedido não encontrado');
        }

        $pedido->delete();

        return redirect()->route('pedidos')->with('success', 'Pedido excluido com sucesso');
    }
}
