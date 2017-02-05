@extends('main')

@section('title', '| Detalhes do procedimento')

@section('content')

<div class="row">

    <div class="col-md-8">
    
         <h1>{{ $procedimento->nome }}</h1>

         <p class="lead"> {{ $procedimento->preco}}</p>
    
    </div>

    <div class="col-md-4">
        <div class="well">


            <dl class="dl-horizontal">
                <dt>Criado em:</dt>
                <dd>{{ date('j/m/Y H:i', strtotime($procedimento->created_at))}}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Última atualização: </dt>
                <dd>{{ date('j/m/Y H:i', strtotime($procedimento->updated_at))}}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Responsável: </dt>
                <dd>{{ $procedimento->usuario_id }}</dd>
            </dl>

            <hr>

        {{-- <div class="row">
            <div class="col-sm-6">
                {!! Html::linkRoute('produtos.edit', 'Editar', array($produto->id), array('class' => 'btn btn-primary btn-block'))!!}
            </div>

             <div class="col-sm-6">
                 {!! Form::open(['route' => ['produtos.destroy', $produto->id], 'method' => 'DELETE']) !!}
                 {!! Form::submit('Deletar', ['class' => 'btn btn-danger btn-block'])!!}
            </div>
        </div>
        
        <div class="row">    
            <div class="col-md-12">
                 {!! Html::linkRoute('produtos.index', 'Voltar', array($produto->id), array('class' => 'btn btn-primary btn-block btn-h1-espacinho'))!!}
            </div>   
        </div> --}}

        </div>
    </div>
</div>
@endsection