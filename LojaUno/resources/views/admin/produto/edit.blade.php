@extends('main')

@section('title', 'Edição de Produto')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Edição de Produto </h1>
        <hr>

        <form  method="POST" action="{{ route('produto.update', $produto->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group">
                        <label name="nome">Nome:</label>
                        <textarea type="text" class="form-control" id="nome" name="nome" rows="1" style="resize:none;">{{ $produto->nome }}</textarea>
                    </div>

                    <div class="form-group">
                        <label name="modelo">Modelo:</label>
                        <textarea type="text" class="form-control" id="modelo" name="modelo" rows="1" style="resize:none;">{{ $produto->modelo }}</textarea>
                    </div>

                    <div class="form-group">
                        <label name="marcaId">marcaId:</label>
                        <textarea type="text" class="form-control" id="marcaId" name="marcaId" rows="1" style="resize:none;">{{ $produto->modelo }}</textarea>
                    </div>

                    {{-- <div class="form-group">
                        <label name="categoriaPrecos">Preco</label>
                            <select class="form-control" name="categoriaPrecos">
                            @foreach($categoriaPrecos as $catPrec)                               
                                <option value='{{ $catPrec->id }}'>{{ $catPrec->nome }}</option>
                            @endforeach
                            </select>
                    </div> --}}

                    <div class="form-group">
                        <label name="quantidade">Quantidade:</label>
                        <textarea type="text" class="form-control" id="quantidade" name="quantidade" rows="1" style="resize:none;">{{ $produto->quantidade }}</textarea>
                    </div>

                    <div class="form-group">
                        <label name="descricao">Descrição:</label>
                        <textarea type="text" class="form-control" id="descricao" name="descricao" rows="1" style="resize:none;">{{ $produto->descricao }}</textarea>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {{-- <input type="submit" value="Editar Produto" class="btn btn-success btn-lg btn-block"> --}}
                     <button type="submit" class="btn btn-success btn-block">Save</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </div>
            </form>


            {{-- {{ Form::label('categoriaProduto_id', 'Categoria: ')}}
            {{ Form::select('categoriaProduto_id', $categoriaProdutos, null, array('class' => 'form-control') )}}
            
            {{ Form::label('categoriaPreco_id', 'categoriaPreco_id: ')}}
            {{ Form::text('categoriaPreco_id', null, array('class' => 'form-control') )}}  --}}

            </br>
            </br>
    </div>
</div>

@endsection