<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipousuario = User::tipo();
        $produtos = Produto::all();

        if($tipousuario == 1){
            return view('cliente.index')->with('produtos', $produtos);
        }

        else{
            return view('admin.main')->with('produtos', $produtos);
        }        
    }
}
