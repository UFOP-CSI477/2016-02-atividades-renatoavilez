<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProduto;

class CategoriaProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categoriaProdutos = CategoriaProduto::all();

        return view('admin.categoriaProduto.index')->with('categoriaProdutos', $categoriaProdutos);
    }

    public function categorias()
    {
        $categoriaProdutos = CategoriaProduto::all();
        return view('categorias')->with('categoriaProdutos', $categoriaProdutos);
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
        
        $this->validate($request,array(
            'nome' => 'required|max:255|unique:categoriaProdutos,nome'
        ));

        $categoriaProduto = new categoriaProduto;

        $categoriaProduto->nome = $request->nome;
        $categoriaProduto->status = true;

        $categoriaProduto->save();

        //Session::flash('success', 'Nova Categoria de Preco Cadastrada!');

        return redirect()->route('categoriaProduto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
