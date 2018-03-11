@extends('layouts.app')

@section('content')
    @foreach($citas->chunk(3) as $chunk)
        @if(!$user->esMedico)
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
                                    <h3><strong>Medico:</strong><a href="/user/{{\App\Cita::obtenerMedico($cita)->userName}}">{{\App\Cita::obtenerMedico($cita)->name}}</a></h3>
                                    <h3><strong>Clinica:</strong><a href="/clinica/{{$cita->clinica->id}}">{{$cita->clinica->nombre}}</a></h3>
                                    <a href="/conversation/{{\App\Cita::obtenerMedico($cita)->name}}"><button class="btn btn-primary">Contactar Médico</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
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
                                    <h3><strong>Paciente:</strong><a href="/user/{{\App\Cita::obtenerPaciente($cita)->userName}}">{{\App\Cita::obtenerPaciente($cita)->name}} {{\App\Cita::obtenerPaciente($cita)->lastName}}</a></h3>
                                    <h3><strong>Clinica:</strong><a href="/clinica/{{$cita->clinica->id}}">{{$cita->clinica->nombre}}</a></h3>
                                    <a href="/conversation/{{\App\Cita::obtenerPaciente($cita)->name}}"><button class="btn btn-primary">Contactar Paciente</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach
    {{ $citas->links('pagination::bootstrap-4') }}
@endsection