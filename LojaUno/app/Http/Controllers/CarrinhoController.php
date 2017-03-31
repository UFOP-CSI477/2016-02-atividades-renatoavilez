<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Carrinho;

use Session;

class CarrinhoController extends Controller
{
    public function index() {
        if (!Session::has('carrinho')) {
            return view('carrinho');
        }

        $carrinhoVelho = Session::get('carrinho');
        $carrinho = new Carrinho($carrinhoVelho);
        return view('carrinho', ['produtos' => $carrinho->itens, 'totalPreco' => $carrinho->totalPreco]);
    }

    public function addCarrinho(Request $request, $id) {
        $produto = Produto::find($id);
        $carrinhoVelho = Session::has('carrinho') ? Session::get('carrinho') : null;
        $carrinho = new Carrinho($carrinhoVelho);
        $carrinho->add($produto, $produto->id);

        $request->session()->put('carrinho', $carrinho);
        //dd($request->session());
        return redirect()->route('carrinho.index');
    }
}
