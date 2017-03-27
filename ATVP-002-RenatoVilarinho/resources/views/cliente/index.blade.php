@extends('cliente.main')

@section('titulo', 'Produtos')

@section('content')


<div class="row">
     
    @foreach ($produtos as $produto)
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    {{-- <img class="profile-user-img img-responsive img-circle" src="{{ $produto->imagem }}" alt="iMAGEM DO PRODUTO"> --}}

                    <h3 class="profile-username text-center">{{ $produto->nome }}</h3>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Preço:</b> <a class="pull-right">R${{ $produto->preco }}</a>
                        </li>
                    </ul>


                    {{-- <div class="row">                                          ===> FUNCIONANDO PARA COMPRAS
                        <form  method="POST" action="{{ route('compras.store') }}">
                            <div class="col-md-12">        
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label name="quantidade">Quantidade:</label>
                                            <input id="quantidade" name="quantidade" class="form-control">
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <div class="box-footer">
                                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input type="submit" value="Comprar" class="btn btn-block btn-bg-primary btn-primary">
                                </div>
                            </div>
                        </form>
                    </div> --}}

                    <div class="row">
                        {{-- <form  method="POST" action="{{ route('carrinho.store') }}"> --}}
                            <div class="col-md-12">        
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label name="quantidade">Quantidade:</label>
                                            <input id="quantidade" name="quantidade" class="form-control">
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-12">
                                <div class="box-footer">
                                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input type="submit" value="Adicionar ao Carrinho" class="btn btn-block btn-bg-primary btn-primary">
                                    <a href="{{ route('produto.addCarrinho', ['id' => $produto->id]) }}" role="button" class="btn btn-block btn-bg-primary btn-primary">CARRRINHO</a>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-block btn-bg-primary btn-primary btn-warning">Visualizar</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endforeach
       
</div>

@stop
