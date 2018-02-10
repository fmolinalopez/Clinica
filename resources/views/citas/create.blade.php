@extends('layouts.app')

@section('content')
    <div class="text-center titulo">
        <h1>Pedir una cita</h1>
    </div>

    <div id="cita">
        <form action="{{ route('crearCita') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group selectClinicas">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Clinica</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option>Elija una clinica...</option>
                        @foreach($clinicas as $clinica)
                            <option @if(isset($selectedClinica) && $selectedClinica->id == $clinica->id) selected @endif name="clinica"  value="{{$clinica->id}}">Nombre: {{$clinica->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if(isset($selectedClinica))
            <div class="form-group selectMedicos">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Médico</label>
                    </div>
                    <select class="custom-select" id="medicos" name="medico">
                        <option>Elija un médico...</option>
                        @foreach($selectedClinica->medicos  as $medico)
                            <option value="{{$medico->id}}">Nombre: {{$medico->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div hidden class="form-group hora">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="datetimepicker">Fecha y hora de la cita</label>
                    </div>
                    <input id="datetimepicker" name="horaCita" type="text" >
                </div>
                <div hidden class="alert alert-danger" id="alertFecha" role="alert">
                    Fecha no disponible.
                </div>
            </div>

            <button hidden class="btn btn-primary" type="submit" id="pedirCita">Pedir cita</button>
            @endif
        </form>

        {{--<div>--}}
            {{--@foreach($clinicas as $clinica)--}}
                {{--@foreach(\App\Clinica::obtenerMedicos($clinica) as $medico)--}}
                    {{--<p>{{$medico->nombre}}</p>--}}
                {{--@endforeach--}}
            {{--@endforeach--}}
        {{--</div>--}}
    </div>
    @push('scripts')
        <script src="{{ asset('js/pedirCita.js') }}" defer></script>
    @endpush
@endsection