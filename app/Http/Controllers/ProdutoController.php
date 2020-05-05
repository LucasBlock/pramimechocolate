<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Categoria;
use App\Imagem;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return view('produto.index', compact(['produtos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produto.form', compact(['categorias']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = Produto::create($request->all());
        if($request->hasFile('imagens'))
        {
            $allowedfileExtension=['pdf','jpg','png','docx'];
            $files = $request->file('imagens');
            foreach($files as $file){

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check){
                    foreach ($request->imagens as $photo) {
                        $filename = $photo->store('imagens');
                        Imagem::create([
                            'produto_id' => $produto->id,
                            'url' => $filename
                        ]);
                    }
                }
            }
        }
        return redirect()->route('produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return response()->json(Produto::all());

        return view('produto.show', compact(['produto']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();

        return view('produto.edit', compact(['produto', 'categorias']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->fill($request->all());
        $produto->save();

        return redirect()->route('produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        $produto->delete();

        return redirect()->route('produtos');
    }
}
