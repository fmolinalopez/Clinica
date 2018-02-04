@extends('layouts.app')

@section('content')
    <div class="row text-center titulo">
        <h1>Lista de Médicos</h1>
    </div>
    @forelse($medicos as $medico)
        @include('medicos.medico')
    @empty
        <p>No hay médicos para mostrar.</p>
    @endforelse
    <div class="row text-center">
        {{ $medicos->links('pagination::bootstrap-4') }}
    </div>
@endsection
