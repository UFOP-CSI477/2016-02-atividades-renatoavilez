@extends('main')

@section('title', '| Detalhes do produto')

@section('content')

<div class="row">

    <div class="col-md-8">
    
         <h1>{{ $produto->nome }}</h1>

         <p class="lead"> {{ $produto->descricao}}</p>
    
    </div>

    {{-- <div class="col-md-4">
        <div class="well">
            <center> <img src= "{{$produto->imagem}}"  style="width: 128px; height: 128px;" align="middle" /> </center>
        </div>
    </div> --}}

    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Linha:</dt>
                <dd>{{ $produto->categoriaPreco->nome }}</dd>
            </dl>

             <dl class="dl-horizontal">
                <dt>Categoria:</dt>
                <dd>{{ $produto->categoriaProduto->nome }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Criado em:</dt>
                <dd>{{ date('j/m/Y H:i', strtotime($produto->created_at))}}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Última atualização: </dt>
                <dd>{{ date('j/m/Y H:i', strtotime($produto->updated_at))}}</dd>
            </dl>

            <hr>

        
        <div class="row">
            <div class="col-sm-6">
                <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-group-justified btn-warning">Editar</a>
            </div>

             <div class="col-sm-6">
                 <a href="{{ route('produto.destroy', $produto->id) }}" class="btn btn-group-justified btn-danger">Excluir</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                 <a href="{{ route('produto.index') }}" class="btn btn-group-justified btn-default">Voltar</a>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection