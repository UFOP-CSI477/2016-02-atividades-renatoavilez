@extends('cliente.main')

@section('titulo', 'Carrinho de Compras')

@section('content')


{{-- {{dd(Session::get('carrinho'))}} --}}

<div class="row">
    {{-- <div class="col-xs-12">

    @if(Session::has('carrinho'))

        <div class="box">
            <div class="box-header">
                {{-- <h3 class="box-title">Produtos</h3> --}}
                {{-- {{dd(Session::get('carrinho'))}} 
                <div class="col-md-offset-10">
                    <a href="{{ route('produtos.create') }}" class="btn btn-md btn-block btn-primary btn-h1-espacinho">Concluir Compra</a>
                </div>
            </div>
            <!-- /.box-header -->


            

                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Menu</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($produtos as $produto)

                            <tr>
                                <td>{{ $produto->nome}}</td>
                                {{-- <td>{{ $produto->nome}}</td> --}}
                                {{-- <td>{{ $produto->preco }}</td> 
                                <td>
                                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-bg-primary btn-warning">Ver</a>
                                    <a href="{{ route('produtos.destroy', $produto->id) }}" class="btn btn-bg-primary btn-danger">Apagar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>               
                    </table>
                </div>
                <!-- /.box-body -->
            
            @else
                <strong>NÃO TEM PRODUTO NO CARRINHO VÉI</strong>
            @endif

        </div>
        <!-- /.box -->
    </div>--}}




@section('content')
    {{-- @foreach($produtos as $productChunk) --}}
        <div class="row">
            @foreach($produtos as $produto)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        {{-- <img src="{{ $produto->imagePath }}" alt="..." class="img-responsive"> --}}
                        <div class="caption">
                            <h3>{{ $produto['item']['nome'] }}</h3>
                            {{-- <p class="description">{{ $produto->description }}</p> --}}
                            <div class="clearfix">
                                <div class="pull-left price">${{ $produto->rpeco }}</div>
                                <a href="{{ route('produto.addCarrinho', ['id' => $produto->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    {{-- @endforeach --}}
@endsection










</div>
<!-- /.row -->

@stop

@section('scriptLocal')

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

@stop