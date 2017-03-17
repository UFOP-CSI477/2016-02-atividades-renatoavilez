<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use Auth;
use Session;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $compras = session('produto_id');
        // //$compras = $request->session()->get('produto');
        // $request->session()->push('carrinho', array_merge((array)Session::get('carrinho',[]), $produto));
        return view('cliente.carrinho');//->with('compras', $compras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Session::put('produto', $request->produto_id);
       
        Session::push('produto', $request->produto_id);
        return redirect()->route('carrinho.index');


    //     $product_from_db = Produto::find('$id');
    //     $produto = [];
    //     $produto['id'] = $id;
    // //you can add all data you need like this etc...
    //     $produto['nome'] = $product_from_db->nome;
    //     $produto['quantidade'] = $quantity;

    //     $request->session()->push('carrinho', array_merge((array)Session::get('carrinho',[]), $produto));    
    //     flash()->success('Rolou');

       // return redirect()->route('carrinho.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtos = session('carrinho');
        return view('carrinho', compact('produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
