@extends('main')

@section('titulo', 'Linhas de Produtos')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>Categorias de Preços</h1>
        </div>

        <div class="col-md-2">    
            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#ModalNovaCategoria"> Nova Categoria </button>
        </div>
    </div>     

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Criado em:</th>
                    {{-- <th>Status</th> --}}
                    <th>Menu</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($categoriaPrecos as $categoria)
                        <tr>
                            <th>{{ $categoria->id }}</th>
                            <td>{{ $categoria->nome }}</td>
                            <td>R$ {{ number_format($categoria->preco, 2, '.', ',') }}</td>
                            <td>{{ date('j/m/Y H:i', strtotime($categoria->created_at))}}</td>
                            <td><a href="#" class="btn btn-sm btn-warning">Editar</a> <a href="#" class="btn btn-sm btn-danger">Excluir</a></td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
    </div>


     <div class="modal fade" id="ModalNovaCategoria" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h4 class="modal-title" id="favoritesModalLabel">Nova Categoria de Preço</h4>
                </div>

                <form method="POST" action="{{ route('categoriaPreco.store') }}">
                <div class="modal-body">                  
                    <div class="form-group">
                        <label name="nome">Nome:</label>
                        <input id="nome" name="nome" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label name="preco">Preco(R$):</label>
                        <input id="preco" name="preco" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <span class="pull-right">
                        <input type="submit" value="Criar Categoria" class="btn btn-success">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">              
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>                               
                    </span>
                </div>
                </form>
            </div>
        </div>
    </div>

@stop