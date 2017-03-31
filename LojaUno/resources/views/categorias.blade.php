@extends('main')

@section('titulo', 'Linhas de Produtos')

@section('content')

    <div class="row">
            <h1>Categorias de Produtos</h1>
    </div>     

    <div class="row">
        @foreach ($categoriaProdutos as $categoria)

            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center ">{{ $categoria->nome }}</h3>
                        </div>

                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et maximus nisl. Nullam a arcu et quam volutpat sollicitudin. Aliquam erat volutpat. Maecenas in nibh vitae metus aliquam volutpat. Nam at odio vel urna hendrerit congue. 
                        </div>

                        <div class="panel-footer">
                            {{-- <form method="POST" action="{{ route('produtoCategoria') }}">
                                <input type="hidden" name="id" value= "{{$categoria->id}}" > 
                                <button type="button" class="btn btn-success" >Confira</button>
                            </form>                     --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@stop