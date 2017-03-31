@extends('main')

@section('title', '| Detalhes do produto')

@section('content')

<div class="row">

    <div class="col-md-8">
    
         <h1>{{ $produto->nome }}</h1>

         <p class="lead"> {{ $produto->descricao}}</p>
    
    </div>

    <div class="col-md-4">
        <div class="well">

            <dl class="dl-horizontal">
                <label>Linha:</label>
                <p>{{ $produto->categoriaPreco->nome }}</p>
            </dl>
            <dl class="dl-horizontal">
                <label>Categoria:</label>
                <p>{{ $produto->categoriaProduto->nome }}</p>
            </dl>

            <hr>

        
        <div class="row">
            <div class="col-md-12">
                 {{-- {!! Html::linkRoute('produtos.index', 'Voltar', array($produto->id), array('class' => 'btn btn-primary btn-block btn-h1-espacinho'))!!} --}}
            </div>
        </div>

        </div>
    </div>
</div>
@endsection