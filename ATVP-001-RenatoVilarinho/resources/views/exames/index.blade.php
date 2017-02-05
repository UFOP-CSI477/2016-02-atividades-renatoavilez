@extends('main')

@section('titulo', 'Exames')

@section('content')

    <div class="row">

        <div class="col-md-10">
            <h1>Exames</h1>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#ModalNovoExame">Novo Exame</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Paciente</th>
                    <th>Procedimento</th>
                    <th>Data</th>
                    <th>Menu</th>
                </thead>

                <tbody>
                    @foreach ($exames as $exame)
                        <tr>
                            <td>{{ $exame->id }}</td>

                            <td>{{ $exame->user->name}}</td>
                            
                            <td>{{ $exame->procedimento->nome }}</td>

                            <td>{{ $exame->data }}</td>

                            <td>
                                <a href="{{ route('exames.edit', $exame->id) }}" class="btn btn-lg btn-bg-primary">Editar</a>
                                <a href="{{ route('exames.destroy', $exame->id) }}" class="btn btn-lg btn-danger">Apagar</a>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

    <div class="modal fade" id="ModalNovoExame" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h4 class="modal-title" id="favoritesModalLabel">Agendar Exame</h4>
                </div>

                <form method="POST" action="{{ route('exames.store') }}">
                <div class="modal-body">                  
                    <div class="form-group">
                        <select class="form-group" name="procedimento_id">
                            @foreach($procedimentos as $procedimento)
                                <option value='{{ $procedimento->id }}'> {{ $procedimento->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                   
                    
                    <div class="form-group">
                        <label name="data">Data (dd/mm/aaaa)</label>
                        <input id="data" name="data" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <span class="pull-right">
                        <input type="submit" value="Agendar Exame" class="btn btn-success">
                        {{-- <input type="hidden" name="paciente_id" value="2">  --}}
                        <input type="hidden" name="_token" value="{{ Session::token() }}">              
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>                               
                    </span>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalEditarExame" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
 
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h4 class="modal-title" id="favoritesModalLabel">Editar Agendamento de Exame</h4>
                </div>
                
                
                    <form method="POST" action="{{ route('exames.update', $exame->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                    <div class="modal-body">                
                        <div class="form-group">
                            <select class="form-group" name="procedimento_id">
                                @foreach($procedimentos as $procedimento)
                                    <option value='{{ $procedimento->id }}'> {{ $procedimento->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label name="data">Data (dd/mm/aaaa)</label>
                            <textarea type="text" rows="1" class="form-control" id="data" name="data">{{ $exame->data }}</textarea>
                        </div>
                </div>

                <div class="modal-footer">
                    <span class="pull-right">
                        <button type="submit" class="btn btn-success btn-block">Salvar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        
                    </span>
                </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('scriptLocal')

    <script>
        $('#ModalEditarExame').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('exame_id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
                modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body input').val(recipient)
        })
    </script>
@stop