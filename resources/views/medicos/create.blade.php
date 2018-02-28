@extends('layouts.app')

{{--TODO Al crear un medico deben añadirsele las clinicas selecionadas.(attach)--}}

@section('content')
    <div class="text-center ">
        <h1>Añadir un nuevo médico</h1>
    </div>
    <form action="{{ route('storeMedico') }}" id="medicoForm" method="post">
        {{ csrf_field() }}
        <div class="form-group  {{$errors->has('imagen') ? ' has-error' : ''}}">
            <label for="imagen">Imagen</label>
            <input class="form-control" type="url" id="imagen" name="imagen" value="{{ old('imagen')}}" >
        </div>
        @if($errors->has('imagen'))
            @foreach($errors->get('imagen') as $message)
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endforeach
        @endif

        <div class="form-group  {{$errors->has('nombre') ? ' has-error' : ''}}">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre')}}" >
        </div>
        @if($errors->has('nombre'))
            @foreach($errors->get('nombre') as $message)
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endforeach
        @endif

        <div class="form-group  {{$errors->has('email') ? ' has-error' : ''}}">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email')}}" >
        </div>
        @if($errors->has('email'))
            @foreach($errors->get('email') as $message)
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endforeach
        @endif

        <div class="form-group  {{$errors->has('especialidad') ? ' has-error' : ''}}">
            <label for="especialidad">Especialidad</label>
            <input class="form-control" type="text" id="especialidad" name="especialidad" value="{{ old('especialidad')}}" >
        </div>
        @if($errors->has('especialidad'))
            @foreach($errors->get('especialidad') as $message)
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endforeach
        @endif

        <div class="form-group  {{$errors->has('clinicas') ? ' has-error' : ''}}">
            <label for="clinicas">Clinicas</label><br>
            <select class="js-example-basic-multiple" name="clinicas[]" id="clinicas" multiple="multiple">
                @foreach($clinicas as $clinica)
                    <option value="{{$clinica->id}}" >{{$clinica->nombre}}</option>
                @endforeach
            </select>
            @if($errors->has('clinicas'))
                @foreach($errors->get('clinicas') as $message)
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @endforeach
            @endif
        </div>

        <div class="form-group  {{$errors->has('num_colegiado') ? ' has-error' : ''}}">
            <label for="num_colegiado">Nº de colegiado</label>
            <input class="form-control" type="text" id="num_colegiado" name="num_colegiado" value="{{ old('num_colegiado')}}" >
        </div>
        @if($errors->has('num_colegiado'))
            @foreach($errors->get('num_colegiado') as $message)
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endforeach
        @endif

        <div class="form-group  {{$errors->has('curriculum') ? ' has-error' : ''}}">
            <label for="curriculum">Curriculum</label>
            <input class="form-control" type="text" id="curriculum" name="curriculum" value="{{ old('curriculum')}}" >
        </div>
        @if($errors->has('curriculum'))
            @foreach($errors->get('curriculum') as $message)
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endforeach
        @endif

        <div class="form-group">
            <button type="submit" id="crearMedico" class="btn btn-success">Crear</button>
        </div>
    </form>
    @push('scripts')
        <script src="{{ asset('js/validarMedico.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" defer></script> <!-- Cdn del componente multiselect-->
        <script src="{{ asset('js/multiselect.js') }}" defer></script>
    @endpush
@endsection