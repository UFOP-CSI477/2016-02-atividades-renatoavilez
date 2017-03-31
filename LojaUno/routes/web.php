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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $produtos = \App\Produto::All();
    return view('welcome')->with('produtos',$produtos);
});

Auth::routes();

Route::resource('categoriaPreco','categoriaPrecoController');
Route::resource('categoriaProduto','categoriaProdutoController');
Route::resource('produto','produtoController');

Route::get('/addCarrinho/{id}', [
    'uses' => 'CarrinhoController@addCarrinho',
    'as' => 'carrinho.addCarrinho'
]);

Route::get('/carrinho', [
    'uses' => 'CarrinhoController@index',
    'as' => 'carrinho.index'
]);

Route::get('/checkout', [
    'uses' => 'PedidoController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'PedidoController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::get('/linhas', [
    'uses' => 'CategoriaPrecoController@linhas',
    'as' => 'linhas'
]);

Route::get('/categorias', [
    'uses' => 'CategoriaProdutoController@categorias',
    'as' => 'categorias'
]);

Route::get('/produtoCategoria/{id}', [
    'uses' => 'ProdutoController@produtoCategoria',
    'as' => 'produtoCategoria'
]);

Route::get('/home', 'HomeController@index');
