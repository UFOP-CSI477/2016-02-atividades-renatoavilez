@extends('main')

@section('title', 'Edição de Exame')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1>Edição de Exame </h1>

        <div class="well">
            <dl class="dl-horizontal">
                <dt>Criado em:</dt>
                <dd class="text-muted">{{ date('M j, Y H:ia ', strtotime($exame->created_at)) }}</dd>
                
                <dt>Modificado em:</dt>
                <dd class="text-muted">{{ date('M j, Y h:ia ', strtotime($exame->updated_at)) }}</dd>

                <dt>Paciente:</dt>
                <dd class="text-muted">{{ $exame->user->name }}</dd>
            </dl>
        </div> <!-- /well -->


        <hr>

        <form method="POST" action="{{ route('exames.update', $exame->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="nome">Procedimento:</label>
            {{-- <textarea type="text" class="form-control input-lg" id="nome" name="nome" rows="1" style="resize:none;">{{ $procedimento->nome }}</textarea> --}}
        </div>

        <div class="form-group">
            <select class="form-group" name="procedimento_id">
                @foreach($procedimentos as $procedimento)
                    <option value='{{ $exame->procedimento_id }}'> {{ $procedimento->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="preco">Data:</label>
            <textarea type="text" class="form-control input-lg" id="data" name="data" rows="1" style="resize:none;">{{ $exame->data }}</textarea>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <a href="{{ route('exames.index') }}" class="btn btn-danger btn-block">Voltar</a>
            </div>

            <div class="col-sm-6">
                <button type="submit" class="btn btn-success btn-block">Save</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection