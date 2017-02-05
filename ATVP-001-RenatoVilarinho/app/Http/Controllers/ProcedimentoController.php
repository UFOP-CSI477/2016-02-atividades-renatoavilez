<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

use App\Procedimento;
// use App\Exames;

class ProcedimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedimentos = Procedimento::all();

        return view('procedimentos.index')->with('procedimentos', $procedimentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('procedimentos.create');
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
            'nome' => 'required|max:255',
            'preco' => 'required',
        ));

        $procedimento = new Procedimento;

        $procedimento->nome = $request->nome;
        $procedimento->preco = $request->preco;

        if(Auth::guard("admin_user")){
            $procedimento->usuario_id = Auth::guard("admin_user")->user()->id; 
        }

        else{
            $procedimento->usuario_id = 666;
        }

        $procedimento->save();

        Session::flash('success', 'Novo procedimento cadastrado!');

        return redirect()->route('procedimentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $procedimento = Procedimento::find($id);
        return view('procedimentos.show')->with('procedimento', $procedimento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $procedimento = Procedimento::find($id);

        return view('procedimentos.edit')->with('procedimento',$procedimento);
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
        $procedimento = Procedimento::find($id);
          
            $this->validate($request, array(
                'nome' => 'required|max:255',
                'preco' => 'required',
            ));

        $procedimento->nome = $request->input('nome');
        $procedimento->preco = $request->input('preco');

        // if(Auth::guard("admin_user")){
        //     $procedimento->usuario_id = Auth::guard("admin_user")->user()->id; 
        // }

        // else{
        //     $procedimento->usuario_id = 666;
        // }

        $procedimento->save();

        Session::flash('success', 'O procedimento foi atualizado!');

        return redirect()->route('procedimentos.index');
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
