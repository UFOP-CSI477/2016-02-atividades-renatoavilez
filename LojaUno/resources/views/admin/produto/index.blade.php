@extends('main')

@section('titulo', 'Produtos')

@section('content')

    <div class="row">

        <div class="col-md-10">
            <h1>Produtos</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('produto.create') }}" class="btn btn-block btn-primary btn-h1-espacinho">Novo Produto</a>
        </div>

        <div class="col-md-12"> <hr>  </div>


    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Linha</th>
                    <th>Descrição</th>
                    <th>Criado em:</th>
                    <th>Menu</th>
                </thead>

                <tbody>
                    @foreach ($produtos as $produto)

                        <tr>
                            <td>{{ $produto->id }}</td>

                            <td>{{ $produto->nome }}</td>

                            <td>{{ $produto->categoriaProduto->nome}}</td>
                            
                            <td>{{ $produto->categoriaPreco->nome}}</td>

                            <td>
                                {{ substr($produto->descricao, 0, 50) }}
                                {{ strlen($produto->descricao) > 50 ? "..." : "" }}
                            </td>

                            <td>{{ date('j/m/Y H:i', strtotime($produto->created_at))}}</td>

                            <td>
                                <a href="{{ route('produto.show', $produto->id) }}" class="btn btn-sm btn-info">Ler</a>
                                <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            </td>
                        </tr>

                    @endforeach 

                </tbody>
            </table>

        </div>
    </div>
@stop