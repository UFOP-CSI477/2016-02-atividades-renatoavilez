@extends('main')

@section('title', 'Cadastro de Procedimentos')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Cadastro de Procedimentos </h1>
        <hr>
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <h1>Novo Procedimento</h1>
                <hr>
                <form method="POST" action="{{ route('procedimentos.store') }}">

                    <div class="form-group">
                        <label name="nome">Nome:</label>
                        <input id="nome" name="nome" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="preco">Preco(R$):</label>
                        <input id="preco" name="preco" class="form-control">
                    </div>

                <input type="submit" value="Criar Procedimento" class="btn btn-success btn-lg btn-block">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </div>
            </div>

    </div>
</div>

@endsection