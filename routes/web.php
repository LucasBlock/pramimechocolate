<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/produtos', 'ProdutoController@index')->name('produtos');
    Route::get('/produtos/novo', 'ProdutoController@create')->name('produtos.novo');
    Route::get('/produtos/{id}', 'ProdutoController@show')->name('produtos.visualizar');
    Route::get('/produtos/{id}/editar', 'ProdutoController@edit')->name('produtos.editar');
    Route::get('/produtos/{id}/delete', 'ProdutoController@destroy')->name('produtos.deletar');
    Route::post('/produtos/{id}', 'ProdutoController@update')->name('produtos.atualizar');
    Route::post('/produtos', 'ProdutoController@store')->name('produtos.salvar');

    Route::get('/enderecos', 'EnderecoController@index');
    Route::get('/enderecos/{id}', 'EnderecoController@show');
    Route::put('/enderecos/{id}', 'EnderecoController@update');
    Route::get('/enderecos/novo', 'EnderecoController@create');
    Route::get('/enderecos/{id}/editar', 'EnderecoController@edit');
    Route::post('/enderecos', 'EnderecoController@store');
    Route::get('/enderecos/{id}/delete', 'EnderecoController@destroy');

    Route::get('/categorias', 'CategoriaController@index')->name('categorias');
    Route::get('/categorias/novo', 'CategoriaController@create')->name('categorias.novo');
    Route::get('/categorias/{id}/editar', 'CategoriaController@edit')->name('categorias.editar');
    Route::get('/categorias/{id}/delete', 'CategoriaController@destroy')->name('categorias.deletar');
    Route::post('/categorias/{id}', 'CategoriaController@update')->name('categorias.atualizar');
    Route::post('/categorias', 'CategoriaController@store')->name('categorias.salvar');

    Route::get('/pedidos', 'PedidoController@index')->name('pedidos');
    Route::get('/pedidos/novo', 'PedidoController@create')->name('pedidos.novo');
    Route::get('/pedidos/{id}/editar', 'PedidoController@edit')->name('pedidos.editar');
    Route::get('/pedidos/{id}/delete', 'PedidoController@destroy')->name('pedidos.deletar');
    Route::post('/pedidos/{id}', 'PedidoController@update')->name('pedidos.atualizar');
    Route::post('/pedidos', 'PedidoController@store')->name('pedidos.salvar');

    Route::get('/clientes', 'UserController@index')->name('clientes');
    Route::get('/clientes/novo', 'UserController@create')->name('clientes.novo');
    Route::get('/clientes/{id}', 'UserController@show')->name('clientes.visualizar');
    Route::get('/clientes/{id}/editar', 'UserController@edit')->name('clientes.editar');
    Route::get('/clientes/{id}/delete', 'UserController@destroy')->name('clientes.deletar');
    Route::post('/clientes/{id}', 'UserController@update')->name('clientes.atualizar');
    Route::post('/clientes', 'UserController@store')->name('clientes.salvar');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
