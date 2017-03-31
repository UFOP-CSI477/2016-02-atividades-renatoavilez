@extends('main')

@section('title', 'Cadastro de Produtos')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Cadastro de Produtos </h1>
        <hr>
                
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <h4 class="modal-title" id="favoritesModalLabel">Nova Inscrição</h4>
                

        <form method="POST" action="{{ route('produto.store') }}"  enctype="multipart/form-data">
            <div class="modal-body">                                     
                <div class="form-group">
                    <label name="categoriaPreco_id">Preco</label>
                    <select class="form-control" name="categoriaPreco_id">
                        @foreach($categoriaPrecos as $catPrec)                               
                            <option value='{{ $catPrec->id }}'>{{ $catPrec->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label name="categoriaProduto_id">Categoria</label>
                    <select class="form-control" name="categoriaProduto_id">
                        @foreach($categoriaProdutos as $categoria)                               
                            <option value='{{ $categoria->id }}'>{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label name="nome">Nome: </label>
                    <input id="nome" name="nome" class="form-control">
                </div>

                <div class="form-group">
                    <label name="modelo">Modelo: </label>
                    <input id="modelo" name="modelo" class="form-control">
                </div>

                <div class="form-group">
                    <label name="marca_id">marca_id: </label>
                    <input id="marca_id" name="marca_id" class="form-control">
                </div>

                <div class="form-group">
                    <label name="quantidade">Quantidade: </label>
                    <input id="quantidade" name="quantidade" class="form-control">
                </div>

                <div class="form-group">
                    <label name="descricao">Descricao: </label>
                    <input id="descricao" name="descricao" class="form-control">
                </div>
            </div>

<div class="form-group">
  <label class="col-md-4 control-label" for="imagem">Imagem</label>  
  <div class="col-md-4">
  <input id="imagem" name="imagem" type="file" placeholder="placeholder" class="form-control input-md">
    
  </div>
</div>


        
            <span class="pull-right">
                <input type="submit" value="Concluir" class="btn btn-success">
                <input type="hidden" name="atleta_id" value="{{ Auth::id() }}">
                <input type="hidden" name="_token" value="{{ Session::token() }}">              
                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>                               
            </span>
        
        </form>
    </div>
</div>

@endsection