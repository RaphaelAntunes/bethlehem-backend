@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'eventos',
])



@include('pages.new-evento')

@section('content')
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-1">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">Eventos</h3>
                                    <hr>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="#" class="btn btn-sm btn-primary" onclick="abrirModal()">Adicionar</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($eventos as $evento)
                                <div class="col-md-4 mb-4">
                                    <div class="card card-event">
                                        <div class="card-body">

                                            <form method="post"
                                                action="{{ $evento->estaParticipando($evento->id) ? route('remover-presenca') : route('marcar-presenca') }}">
                                                @csrf
                                                <input type="hidden" name="evento_id" value="{{ $evento->id }}">

                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="marcado"
                                                    value="{{ $evento->estaParticipando(auth()->user()->id) ? 0 : 1 }}">
                                                <div style="justify-content:right;" class="d-flex aling-items-right">

                                                        <span style="cursor:pointer; font-size: 20px;"onclick="removerEvento({{$evento->id}})" data-notify="icon" style="margin-right: 0px; font-size: 20px;"
                                                            class="nc-icon nc-simple-remove"></span>
                                                </div>
                                                <span data-notify="icon" class="nc-icon nc-istanbul mb-1"></span>
                                                <h5 class="card-title">{{ $evento->titulo }}</h5>
                                                @php
                                                    // Consulta para obter o nome do mediador com base no ID
                                                    $mediador = App\Models\getMediadores::find($evento->mediador);
                                                    $mediador = json_decode($mediador);
                                                @endphp
                                                @if ($mediador)
                                                    <h6 class="card-subtitle mb-2 text-muted">Por: {{ $mediador->name }}
                                                    </h6>
                                                @endif
                                                <hr>
                                                <p class="card-text">{{ $evento->descricao }}</p>
                                                <!-- Botão para marcar ou cancelar a presença -->
                                                <button type="submit"
                                                    class="btn btn-sm {{ $evento->estaParticipando($evento->id) ? 'btn-danger' : 'btn-primary' }}">
                                                    {{ $evento->estaParticipando($evento->id) ? 'Cancelar Presença' : 'Marcar Presenças' }}
                                                </button>
                                                <i
                                                    class="nc-icon nc-single-02 ml-2">{{ $evento->numparticipantes($evento->id) }}</i>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
       

        function removerEvento(eventoId) {
            var token = $('input[name="_token"]').val();
            if (confirm('Tem certeza de que deseja remover este evento?')) {
            $.ajax({
                url: '/remover-evento/' + eventoId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token // Inclua o token CSRF no cabeçalho da requisição
                },
                success: function(response) {
                    window.location.reload();

                },
                error: function(error) {
                    window.location.reload();

                }
            });
        }}
    </script>
