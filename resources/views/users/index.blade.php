@extends('layouts.app')

@section('content')
    <div class="text-center titulo">
        <h1>Médicos de {{ $user['name']}}</h1>
    </div>
    @forelse($medicos as $medico)
        @include('medicos.medico')
    @empty
        <p>No hay médicos para mostrar.</p>
    @endforelse

    {{ $medicos->links('pagination::bootstrap-4') }}
@endsection