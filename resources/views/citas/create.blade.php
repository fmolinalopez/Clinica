@extends('layouts.app')

{{--TODO Al crear un medico deben añadirsele las clinicas selecionadas.(attach)--}}

@section('content')
    <div class="text-center titulo">
        <h1>Añadir un nuevo médico</h1>
    </div>

    <div id="cita">
        <form action="{{ route('crearCita') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group clinicas">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Clinicas</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Elija una clinica...</option>
                        @foreach($clinicas as $clinica)
                            <option value="{{$clinica->id}}">Nombre: {{$clinica->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
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
        <script src="{{ asset('js/medicosDeClinica.js') }}" defer></script>
    @endpush
@endsection