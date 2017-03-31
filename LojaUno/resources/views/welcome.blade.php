@extends('main')

@section('titulo', 'Home')

@section('content')

    <div class="row">

        <div class="col-md-10">
            <h1>Conheça nossos produtos</h1>
        </div>
    </div>

    {{-- {{phpinfo()}} --}}
 
 <div class="row">
     
    @foreach ($produtos as $produto)
    <?php $img = $produto->imagem; ?>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center ">{{ $produto->nome }}</h3>
                    </div>

                    <div class="panel-body">
                        <center> <img src="{{$produto->imagem}}"  style="width: 128px; height: 128px;" align="middle" /> </center>
                    </div>

                    
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Linha</b> <a class="pull-right">{{ $produto->categoriaPreco->nome }}</a>
                        </li>
                    </ul>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('produto.show', $produto->id) }}" class="btn btn-block btn-bg-primary btn-primary btn-warning">Detalhes</a>
                            </div>  

                            <div class="col-md-6">
                                <a href="{{ route('carrinho.addCarrinho', ['id' => $produto->id]) }}" class="btn btn-block btn-bg-primary btn-primary" role="button">Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
      
</div>


@stop