@extends('main')

@section('titulo', 'Procedimentos')

@section('content')

    <div class="row">

        <div class="col-md-10">
            <h1>Procedimentos</h1>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#ModalNovoProcedimento">Novo Procedimento</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Responsável</th>
                    <th>Menu</th>
                </thead>

                <tbody>
                    @foreach ($procedimentos as $procedimento)

                        <tr>
                            <td>{{ $procedimento->id }}</td>

                            <td>{{ $procedimento->nome }}</td>

                            <td>R$ {{ number_format($procedimento->preco, 2) }}</td>

                            <td>{{ $procedimento->adminUser->name}}</td>

                            <td>
                               <a href="{{ route('procedimentos.edit', $procedimento->id) }}" class="btn btn-lg btn-danger">Editar</a>
                               <a href="{{ route('procedimentos.destroy', $procedimento->id) }}" class="btn btn-lg btn-danger">Excluir</a>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

    <div class="modal fade" id="ModalNovoProcedimento" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h4 class="modal-title" id="favoritesModalLabel">Novo Procedimento</h4>
                </div>

                <form method="POST" action="{{ route('procedimentos.store') }}">
                <div class="modal-body">                  
                    <div class="form-group">
                        <label name="nome">Nome</label>
                        <input id="nome" name="nome" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label name="preco">Preço (R$)</label>
                        <input id="preco" name="preco" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <span class="pull-right">
                        <input type="submit" value="Criar Procedimento" class="btn btn-success">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">              
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>                               
                    </span>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="ModalEditarProcedimento" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h4 class="modal-title" id="favoritesModalLabel">Editar Procedimento</h4>
                </div>

                <form method="POST" action="{{ route('procedimentos.update', $procedimento->id) }}">
                <div class="modal-body">                  
                    <div class="form-group">
                        <label name="nome">Nome</label>
                        {{-- <input id="nome" name="nome" class="form-control"> --}}
                        <textarea type="text" rows="1" class="form-control" id="nome" name="nome">{{ $procedimento->nome }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label name="preco">Preco (R$)</label>
                        {{-- <input id="preco" name="preco" class="form-control"> --}}
                        <textarea type="text" rows="1" class="form-control" id="preco" name="preco">{{ $procedimento->preco }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <span class="pull-right">
                        {{-- <input type="submit" value="Criar Procedimento" class="btn btn-success">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">              
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>                                --}}
                        <button type="submit" class="btn btn-success btn-block">Salvar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                         {{ method_field('PUT') }}
                    </span>
                </div>
                </form>
            </div>
        </div>
    </div>

@stop