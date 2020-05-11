<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Endereco;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all()
                      ->where('admin', 0);
        return view('usuario.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.form');
    }

    public function store(Request $request)
    {
        $cliente = new User();

        $cliente->fill($request->all());
        $cliente->password = Hash::make('123456789');

        $cliente->save();

        $endereco = new Endereco();

        $endereco->fill($request->all());
        $endereco->user_id = $cliente->id;
        $endereco->save();

        return redirect()->route('clientes')->with('success','Cliente criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = User::find($id);

        if (!$cliente) {
            return response()->view('layouts.notfound');
        }

        return view('usuario.edit', compact(['cliente']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = User::find($id);

        $cliente->fill($request->all());
        $cliente->save();

        $endereco = Endereco::where('user_id', $cliente->id)->get()->first();
        $endereco->fill($request->all());
        $endereco->save();

        return redirect()->route('clientes')->with('success', 'Cliente criado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = User::find($id);

        if (!$cliente) {
            return response()->view('layouts.notfound');
        }

        //
        $cliente->delete();

        return redirect()->route('clientes')->with('success', 'Cliente excluido com sucesso');
    }
}
