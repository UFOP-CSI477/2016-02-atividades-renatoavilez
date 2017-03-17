@extends('cliente.main')

@section('titulo', 'Carrinho de Compras')

@section('content')


<div class="row">
     
    <div class="col-md-12">

@if(Session::has('produto'))
    
    {{-- @foreach(Session::all('produto') as $item)
        <strong>{{$item['id']}}</strong>
        {{$item['nome']}}
        {{$item['quantidade']}}
    @endforeach --}}
{{$itens = Session::all()}}

{{-- @foreach($itens as $item)
        <strong>{{$item}}</strong>
       
    @endforeach --}}
    @foreach (Session::get('cart.items') as $produto) 
       {{$produto}}
       @endforeach

@else

    <strong>nao tem carrinho</strong>


@endif

    </div>
       
</div>



@stop
