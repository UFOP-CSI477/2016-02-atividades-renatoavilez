<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

use App\Carrinho;
use App\Pedido;

class pedidoController extends Controller
{

    public function getCheckout()
    {
        if (!Session::has('carrinho')) {
            return view('carrinho.index');
        }
        $carrinhoVelho = Session::get('carrinho');
        $carrinho = new Carrinho($carrinhoVelho);
        $total = $carrinho->precoTotal;
        return view('cliente.checkout', ['total' => $total]);
    }


    public function postCheckout(Request $request)
    {
        if (!Session::has('carrinho')) {
            return redirect()->route('carrinho.index');
        }
        $carrinhoVelho = Session::get('carrinho');
        $carrinho = new Carrinho($carrinhoVelho);

        try {
            
            $pedido = new Pedido();
            $pedido->carrinho = serialize($carrinho);
            $pedido->endereco = $request->input('endereco');
            //$pedido->nome = $request->input('nome');
            
            Auth::user()->pedidos()->save($pedido);
        } catch (\Exception $e) {
            //return redirect()->route('checkout')->with('error', $e->getMessage());
            return redirect()->route('carrinho.index');
        }

        Session::forget('carrinho');
        //return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
        redirect()->route('produto.index');
    }
}
