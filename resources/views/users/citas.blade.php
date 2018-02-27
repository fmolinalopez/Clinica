@extends('layouts.app')

@section('content')
    @foreach($citas->chunk(3) as $chunk)
        <div class="card-group row course-set courses__row citas">
            @foreach($chunk as $cita)
            <div class="card text-center mt-5">
                <div class="card-header bg-primary">
                    <h1 class="text-light"><strong>Fecha de la cita:</strong></h1>
                    <h2>{{$cita->fecha_cita}}</h2>
                </div>
                <div class="card-body">
                    <div class="row prof">
                        <div class="col text-center">
                            <h3><strong>Medico:</strong>{{$cita->medico->nombre}}</h3>
                            <h3><strong>Clinica:</strong><a href="#">Nombre de la clinica</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endforeach
    {{ $citas->links() }}
@endsection