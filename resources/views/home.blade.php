@extends('layouts.app')

@section('content')
    <div class="row text-center titulo">
        <h1>Lista de Médicos</h1>
    </div>
    @forelse($medicos as $medico)
        <div class="row medicos">
            <div class="col-md-12">
                <div class="col-md-4">
                    <img src="{{$medico['imagen']}}" alt="Imagen del médico">
                </div>
                <div class="col-md-7">
                    <p><strong>Nombre:</strong>{{ $medico['nombre'] }}</p>
                    <p><strong>Email:</strong>{{ $medico['email'] }}</p>
                    <p><strong>Especialidad:</strong> {{ $medico['especialidad'] }}</p>
                    <p><strong>Clinicas:</strong>{{ $medico['clinicas'] }}</p>
                    <p><strong>Nº de colegiado:</strong>{{ $medico['num_colegiado'] }}</p>
                    <p><strong>Curriculum:</strong>{{ $medico['curriculum'] }}</p>
                    <p><strong>Favoritos:</strong>{{ $medico['favoritos'] }}</p>
                </div>
            </div>
        </div>
    @empty
        <p>No hay médicos para mostrar.</p>
    @endforelse
    <div class="row text-center">
        {{ $medicos->links() }}
    </div>
@endsection
