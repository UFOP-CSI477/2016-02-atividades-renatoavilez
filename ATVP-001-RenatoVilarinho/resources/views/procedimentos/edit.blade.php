@extends('main')

@section('title', 'Edição de Produto')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1>Edição de Procedimento </h1>

        <div class="well">
            <dl class="dl-horizontal">
                <dt>Criado em:</dt>
                <dd class="text-muted">{{ date('M j, Y H:ia ', strtotime($procedimento->created_at)) }}</dd>
                
                <dt>Modificado em:</dt>
                <dd class="text-muted">{{ date('M j, Y h:ia ', strtotime($procedimento->updated_at)) }}</dd>

                <dt>Responsável:</dt>
                <dd class="text-muted">{{ $procedimento->adminUser->name }}</dd>
            </dl>
        </div> <!-- /well -->


        <hr>

        <form method="POST" action="{{ route('procedimentos.update', $procedimento->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="nome">Nome:</label>
            <textarea type="text" class="form-control input-lg" id="nome" name="nome" rows="1" style="resize:none;">{{ $procedimento->nome }}</textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <textarea type="text" class="form-control input-lg" id="preco" name="preco" rows="1" style="resize:none;">{{ $procedimento->preco }}</textarea>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <a href="{{ route('procedimentos.index') }}" class="btn btn-danger btn-block">Voltar</a>
            </div>

            <div class="col-sm-6">
                <button type="submit" class="btn btn-success btn-block">Save</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection