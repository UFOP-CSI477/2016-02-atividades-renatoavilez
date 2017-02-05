<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

use App\Exame;
use App\Procedimento;

use Illuminate\Support\Facades\DB;

class ExameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $exames = Exame::All()->where('paciente_id', '=', $user_id);
        //$exames = Exame::All();

        $procedimentos = Procedimento::All();

        return view('exames.index')->with('exames',$exames)->with('procedimentos',$procedimentos);
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
            'procedimento_id' => 'required',
            'data' => 'required|max:10'
        ));

        $exame = new Exame;

        //$exame->paciente_id = $request->paciente_id;
        $exame->paciente_id = Auth::user()->id;
        $exame->procedimento_id = $request->procedimento_id;
        $exame->data = $request->data;

        $exame->save();

        Session::flash('success', 'Novo exame Cadastrado!');

        return redirect()->route('exames.index');
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
        $exame = Exame::find($id);
        $procedimentos = Procedimento::All();

        return view('exames.edit')->with('exame',$exame)->with('procedimentos',$procedimentos);
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
       $this->validate($request,array(
            'procedimento_id' => 'required',
            'data' => 'required|max:10'
        ));

        
        $exame = Exame::find($id);

        $exame->paciente_id = Auth::user()->id;
        $exame->procedimento_id = $request->input('procedimento_id');
        $exame->data = $request->input('data');

        $exame->save();

        Session::flash('success', 'Agendamento Editado!'); 

        return redirect()->route('exames.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exame = Exame::find($id);
        $exame->delete();

        Session::flash('success', 'O Exame foi excluido');

        return redirect()->route('exames.index');
    }
}
