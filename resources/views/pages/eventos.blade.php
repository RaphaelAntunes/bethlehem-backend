@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'eventos'
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
                               
                                    <form method="post" action="{{ $evento->estaParticipando($evento->id) ? route('remover-presenca') : route('marcar-presenca') }}">
                                        @csrf
                                        <input type="hidden" name="evento_id" value="{{ $evento->id }}">
                                        
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="marcado" value="{{ $evento->estaParticipando(auth()->user()->id) ? 0 : 1 }}">
                                        <div style="justify-content:right;" class="d-flex aling-items-right">
                                            <span data-notify="icon" style="margin-right: 0px; font-size: 20px;"
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
                                        <h6 class="card-subtitle mb-2 text-muted">Por: {{ $mediador->name }}</h6>
                                        @endif
                                        <hr>
                                        <p class="card-text">{{ $evento->descricao }}</p>
                                        <!-- Botão para marcar ou cancelar a presença -->
                                        <button type="submit"
                                            class="btn btn-sm {{ $evento->estaParticipando($evento->id) ? 'btn-danger' : 'btn-primary' }}">
                                            {{ $evento->estaParticipando($evento->id) ? 'Cancelar Presença' : 'Marcar Presenças' }}
                                        </button>
                                        <i class="nc-icon nc-single-02 ml-2">{{$evento->numparticipantes($evento->id)}}</i>
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



@push('scripts')
    <script>
        function SelectText(element) {
            var doc = document,
                text = element,
                range, selection;
            if (doc.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(text);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(text);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }
        window.onload = function () {
            var iconsWrapper = document.getElementById('icons-wrapper'),
                listItems = iconsWrapper.getElementsByTagName('li');
            for (var i = 0; i < listItems.length; i++) {
                listItems[i].onclick = function fun(event) {
                    var selectedTagName = event.target.tagName.toLowerCase();
                    if (selectedTagName == 'p' || selectedTagName == 'em') {
                        SelectText(event.target);
                    } else if (selectedTagName == 'input') {
                        event.target.setSelectionRange(0, event.target.value.length);
                    }
                }

                var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                    beforeContent = beforeContentChar.charCodeAt(0).toString(16);
                var beforeContentElement = document.createElement("em");
                beforeContentElement.textContent = "\\" + beforeContent;
                listItems[i].appendChild(beforeContentElement);

                //create input element to copy/paste chart
                var charCharac = document.createElement('input');
                charCharac.setAttribute('type', 'text');
                charCharac.setAttribute('maxlength', '1');
                charCharac.setAttribute('readonly', 'true');
                charCharac.setAttribute('value', beforeContentChar);
                listItems[i].appendChild(charCharac);
            }
        }
    </script>
@endpush