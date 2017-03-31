@extends('main')

@section('titulo', 'Carrinho de Compras')

@section('content')

    <div class="row">

        <div class="col-md-10">
            <h1>Carrinho de Compras</h1>
        </div>

        <div class="col-md-2">
            <a href="/" class="btn btn-block btn-primary btn-h1-espacinho">voltar</a>
        </div>

        <div class="col-md-12"> <hr>  </div>


    </div>

@if(Session::has('carrinho'))

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Valor Unitario</th>
                    <th>Valor Total</th>
                    <th>Menu</th>
                </thead>

                <tbody>
                    @foreach ($produtos as $produto)

                        <tr>
                            <td>{{ $produto['item']['nome'] }}</td>
                            <td>{{ $produto['qtd'] }}</td>
                            <td>{{ number_format($produto['item']['categoriaPreco']['preco'], 2, '.', ',') }}</td>
                            <td>{{ number_format(($produto['item']['categoriaPreco']['preco'] * $produto['qtd']), 2, '.', ',') }}</td>  
                            <td>
                                <a href="{{ route('produto.show', $produto['item']['id']) }}" class="btn btn-sm btn-info">Detalhes</a>
                                <a href="#" class="btn btn-sm btn-warning">Remover</a>
                            </td>
                        </tr>

                    @endforeach 

                </tbody>
            </table>

            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <strong>Total: {{ number_format($totalPreco, 2, '.', ',') }}</strong>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    {{-- <a href="{{ route('produto.show', $produto['item']['id']) }}" class="btn btn-success">Checkout</a> --}}
                    <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
                </div>
            </div>
        </div>
    </div>

@else

    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>Zero itens no carrinho!</h2>
        </div>
    </div>

@endif
@stop