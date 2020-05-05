<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/produtos', 'ProdutoController@index')->name('produtos');
Route::get('/produtos/novo', 'ProdutoController@create');
Route::get('/produtos/{id}/editar', 'ProdutoController@edit');
Route::get('/produtos/{id}/delete', 'ProdutoController@destroy');
Route::get('/produtos/{id}', 'ProdutoController@show');
Route::post('/produtos/{id}', 'ProdutoController@update');
Route::post('/produtos', 'ProdutoController@store');

Route::get('/enderecos', 'EnderecoController@index');
Route::get('/enderecos/{id}', 'EnderecoController@show');
Route::put('/enderecos/{id}', 'EnderecoController@update');
Route::get('/enderecos/novo', 'EnderecoController@create');
Route::get('/enderecos/{id}/editar', 'EnderecoController@edit');
Route::post('/enderecos', 'EnderecoController@store');
Route::get('/enderecos/{id}/delete', 'EnderecoController@destroy');

Route::get('/categorias', 'CategoriaController@index')->name('categorias');
Route::get('/categorias/novo', 'CategoriaController@create');
Route::get('/categorias/{id}/editar', 'CategoriaController@edit');
Route::get('/categorias/{id}/delete', 'CategoriaController@destroy');
Route::get('/categorias/{id}', 'CategoriaController@show');
Route::put('/categorias/{id}', 'CategoriaController@update');
Route::post('/categorias', 'CategoriaController@store');

Route::get('/pedidos', 'PedidosController@index');
Route::get('/pedidos/{id}', 'PedidosController@show');
Route::put('/pedidos/{id}', 'PedidosController@update');
Route::get('/pedidos/novo', 'PedidosController@create');
Route::get('/pedidos/{id}/editar', 'PedidosController@edit');
Route::post('/pedidos', 'PedidosController@store');
Route::get('/pedidos/{id}/delete', 'PedidosController@destroy');

Route::get('/clientes', 'UserController@index');
Route::get('/clientes/{id}', 'UserController@show');
Route::put('/clientes/{id}', 'UserController@update');
Route::get('/clientes/novo', 'UserController@create');
Route::get('/clientes/{id}/editar', 'UserController@edit');
Route::post('/clientes', 'UserController@store');
Route::get('/clientes/{id}/delete', 'UserController@destroy');
