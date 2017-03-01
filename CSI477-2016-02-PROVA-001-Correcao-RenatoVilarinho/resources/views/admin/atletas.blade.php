@extends('main')

@section('titulo', 'Atletas')

@section('content')

    <div class="row">

        <div class="col-md-10">
            <h1>Admin - Atletas</h1>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Cadastrado em</th>
                </thead>

                <tbody>
                    @foreach ($atletas as $atleta)

                        <tr>
                            <td>{{ $atleta->id }}</td>
                            <td>{{ $atleta->name }}</td>
                            <td>{{ date('j/m/Y H:i', strtotime($atleta->created_at))}}</td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

@stop