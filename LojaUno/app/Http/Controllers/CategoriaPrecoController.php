<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaPreco;

class CategoriaPrecoController extends Controller
{
    public function index()
    {
        $categoriaPrecos = CategoriaPreco::all();
        return view('admin.categoriaPreco.index')->with('categoriaPrecos', $categoriaPrecos);
    }

    public function linhas()
    {
        $categoriaPrecos = CategoriaPreco::all();
        return view('linhas')->with('categoriaPrecos', $categoriaPrecos);
    }

    public function store(Request $request)
    {
        $this->validate($request,array(
            'nome' => 'required|max:255|unique:categoriaPrecos,nome',
            'preco' => 'required|numeric|min:0'
        ));

        $categoriaPreco = new CategoriaPreco;

        $categoriaPreco->nome = $request->nome;
        $categoriaPreco->status = '1';
        $categoriaPreco->preco = $request->preco;

        $categoriaPreco->save();

        //Session::flash('success', 'Nova Categoria de Preco Cadastrada!');

        return redirect()->route('categoriaPreco.index');
    }
}
