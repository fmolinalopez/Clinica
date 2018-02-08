@extends('layouts.app')

@section('content')
    <div class="text-center titulo">
        <h1>Clinicas a las que pertenece {{ $medico['nombre']}}</h1>
    </div>
    @forelse($medico->clinicas as $clinica)
        <div class="row medicos">
            <div class="col-md-4"></div>
            <div class="col">
                <p><strong>Nombre:</strong>{{ $clinica['nombre'] }}</p>
                <p><strong>Direccion:</strong> {{ $clinica['direccion'] }}</p>
                <p><strong>Email:</strong>{{ $clinica['email'] }}</p>
                <p><strong>Nº de tlf movil:</strong>{{ $clinica['movil'] }}</p>
                <p><strong>Pagina web:</strong>{{ $clinica['web'] }}</p>
                <p><strong>Descripcion:</strong>{{ $clinica['about'] }}</p>
            </div>
        </div>
    @empty
        <p>No hay clínicas para mostrar.</p>
    @endforelse

    {{ $medico->clinicas()->paginate(10)->links('pagination::bootstrap-4') }}
@endsection