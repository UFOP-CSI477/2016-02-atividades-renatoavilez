<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $produtos = \App\Produto::All();
    return view('guest.welcome')->with('produtos',$produtos);
});

Route::get('add-carrinho/{id}', [
    'uses' => 'ProdutoController@getAddCarrinho',
    'as' => 'produto.addCarrinho'
]);

Route::get('carrinho', [
    'uses' => 'ProdutoController@getCarrinho',
    'as' => 'produto.indexCarrinho'
]);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('produtos','ProdutoController');

Route::resource('compras','CompraController');

//Route::resource('carrinho','CarrinhoController');