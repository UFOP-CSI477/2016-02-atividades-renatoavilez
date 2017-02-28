@extends('main')

@section('titulo', 'Eventos')

@section('content')

    <div class="row">

        <div class="col-md-10">
            <h1>Eventos</h1>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#ModalNovoEvento">Novo Evento</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Data</th>
                    <th>Menu</th>
                </thead>

                <tbody>
                    @foreach ($eventos as $evento)

                        <tr>
                            <td>{{ $evento->id }}</td>

                            <td>{{ $evento->nome }}</td>

                            <td>{{ $evento->preco }}</td>

                            <td>{{ $evento->data}}</td>

                            <td>
                                
                               <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#ModalEditalEvento">Editar</button>
                               <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#ModalEditalEvento">Editar</button>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

    <div class="modal fade" id="ModalNovoEvento" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h4 class="modal-title" id="favoritesModalLabel">Novo Evento</h4>
                </div>

                <form method="POST" action="{{ route('eventos.store') }}">
                <div class="modal-body">                  
                    <div class="form-group">
                        <label name="nome">Nome:</label>
                        <input id="nome" name="nome" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label name="preco">Preco(R$):</label>
                        <input id="preco" name="preco" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="data">Data(dd/mm/aaaa):</label>
                        <input id="data" name="data" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <span class="pull-right">
                        <input type="submit" value="Criar Evento" class="btn btn-success">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">              
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>                               
                    </span>
                </div>
                </form>
            </div>
        </div>
    </div>

 
    {{-- <div class="modal fade" id="ModalEditalEvento" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel"> 

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h4 class="modal-title" id="favoritesModalLabel">Editar Procedimento</h4>
                </div>

                <form method="POST" action="{{ route('eventos.update', $evento->id) }}">
                <div class="modal-body">                  
                    <div class="form-group">
                        <label name="nome">Nome:</label>
                        {{-- <input id="nome" name="nome" class="form-control"> 
                        <textarea type="text" class="form-control input-lg" id="nome" name="nome" rows="1" style="resize:none;">{{ $evento->nome }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label name="preco">Preco(R$):</label>
                        {{-- <input id="preco" name="preco" class="form-control"> 
                        <textarea type="text" class="form-control input-lg" id="preco" name="preco" rows="10">{{ $evento->preco }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <span class="pull-right">
                        {{-- <input type="submit" value="Criar evento" class="btn btn-success">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">              
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>                                
                        <button type="submit" class="btn btn-success btn-block">Salvar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                         {{ method_field('PUT') }}
                    </span>
                </div>
                </form>
            </div>
        </div>
    </div> --}}

@stop