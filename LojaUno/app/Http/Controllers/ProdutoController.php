<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Produto;
use App\CategoriaProduto;
use App\CategoriaPreco;
use App\Pedido;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
            if(Auth::user()->type == 1){
                $produtos = Produto::all();
                $catProdutos = CategoriaProduto::all();
                $catPrecos = CategoriaPreco::all();
                return view('admin.produto.index')->with('produtos', $produtos)->with('categoriaProdutos', $catProdutos)->with('categoriaPrecos', $catPrecos);
            }

        return view('acessoNegado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
            if(Auth::user()->type == 1){
                $catProdutos = CategoriaProduto::all();
                $catPrecos = CategoriaPreco::all();

                return view('admin.produto.create')->with('categoriaProdutos', $catProdutos)->with('categoriaPrecos', $catPrecos);
                }

        return view('acessoNegado');
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'categoriaProduto_id' => 'required',
            'categoriaPreco_id' => 'required',
            'nome' => 'required|max:255',
            'modelo' => 'required|max:255',
            'marca_id' => 'required',
            'quantidade' => 'required',
            'descricao' => 'required'
            ));

        $produto = new Produto;

        $rota = '';

        if ($request->file('imagem')->isValid()) {
            $fnome = $request->file('imagem')->getClientOriginalName();
            $rota = $request->file('imagem')->move("img/", $fnome);
        }

        
        $produto->categoriaProduto_id = $request->categoriaProduto_id;
        $produto->categoriaPreco_id = $request->categoriaPreco_id;
        $produto->nome = $request->nome;
        $produto->modelo = $request->modelo;
        $produto->marca_id = $request->marca_id;
        $produto->quantidade = $request->quantidade;
        $produto->descricao = $request->descricao;
        $produto->imagem = $rota;
        $produto->status = true;

        $produto->save();

        //Session::flash('success', 'Novo produto cadastrado!');

        return redirect()->route('produto.show', $produto->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        
        if(Auth::check())
            if(Auth::user()->type == 1)
                return view('admin.produto.show')->with('produto', $produto);
        
        
        return view('cliente.produto-show')->with('produto', $produto);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $catProdutos = CategoriaProduto::all();
        $catPrecos = CategoriaPreco::all();
        $catsProd = array();
        $catsPrec = array();

        foreach ($catProdutos as $catProduto){
            $catsProd[$catProduto->id] = $catProduto->nome;
        }

        foreach ($catPrecos as $catPreco){
            $catsPrec[$catPreco->id] = $catPreco->nome;
        }

        return view('admin.produto.edit')->with('produto',$produto)->with('categoriaProdutos', $catsProd)->with('categoriaPrecos', $catsPrec);
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
        $produto = Produto::find($id);

        // $this->validate($request, array(
        //     //'categoriaProduto_id' => 'required',
        //     //'categoriaPreco_id' => 'required',
        //     'modelo' => 'required|max:255',
        //     'nome' => 'required|max:255',
        //     //'modelo' => 'required|max:255',
        //     'marca_id' => 'required',
        //     'quantidade' => 'required',
        //     'descricao' => 'required'
        //     ));

        //$produto->categoriaProduto_id = $request->input('categoriaProduto_id');
        //$produto->categoriaPreco_id = $request->input('categoriaPreco_id');
        $produto->nome = $request->input('nome');
        $produto->modelo = $request->input('modelo');
        $produto->marca_id = $request->input('marca_id');
        $produto->quantidade = $request->input('quantidade');
        $produto->descricao = $request->input('descricao');
        $produto->status = true;

        $produto->save();

        //Session::flash('success', 'O produto foi atualizado!');

        return redirect()->route('admin.produto.show', $produto->id);
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

    public function produtoCategoria($id)
    {
        $produtos = Produto::All()->where('categoriaProduto_id', '=', $categoriaProduto_id);
        return view('welcome')->with('produtos',$produtos);
    }
    
}
