@extends('layouts.app')

@section('content')
    <div class="text-center titulo">
        <h1>Pedir una cita</h1>
    </div>

    <div id="cita">
        <form id="citaForm" action="{{ route('crearCita') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group selectClinicas">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light" for="inputGroupSelect01">Clinica</label>
                    </div>
                    <select name="clinica"  class="custom-select" id="inputGroupSelect01">
                        <option>Elija una clinica...</option>
                        @foreach($clinicas as $clinica)
                            <option @if(isset($selectedClinica) && $selectedClinica->id == $clinica->id) selected @endif value="{{$clinica->id}}">Nombre: {{$clinica->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="selectMedico">

            </div>
        </form>
    </div>
    @push('scripts')
        <script src="{{ asset('js/pedirCita.js') }}" defer></script>
    @endpush
@endsection