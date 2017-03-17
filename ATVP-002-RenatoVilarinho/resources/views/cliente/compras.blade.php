@extends('cliente.main')

@section('titulo', 'Compras')

@section('content')


<div class="row">
     
    <div class="col-md-12">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Data</th>
            </thead>

            <tbody>
                @foreach ($compras as $compra)
                    <tr>
                        <td>{{ $compra->id }}</td>

                        <td>{{ $compra->produto_id}}</td>
                        
                        <td>{{ $compra->quantidade }}</td>

                        <td>{{ $compra->data }}</td>
                    </tr>

                @endforeach

            </tbody>
        </table>

    </div>
       
</div>

@stop
