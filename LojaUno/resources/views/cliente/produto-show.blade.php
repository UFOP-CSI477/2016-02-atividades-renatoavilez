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


            <hr>

        
        <div class="row">
                              

                            <div class="col-md-6">
                                <a href="{{ route('carrinho.addCarrinho', ['id' => $produto->id]) }}" class="btn btn-block btn-bg-primary btn-primary" role="button">Comprar</a>
                            </div>

                            <div class="col-md-6">
                 <a href="/" class="btn btn-group-justified btn-default">Voltar</a>
            </div>
            </div>
        
       

        </div>
    </div>
</div>
@endsection