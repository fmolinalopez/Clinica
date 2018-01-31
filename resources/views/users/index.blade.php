@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <h1>Médicos de {{ $user['name']}}</h1>
    </div>
    @forelse($medicos as $medico)
        @include('medicos.medico')
    @empty
        <p>No hay médicos para mostrar.</p>
    @endforelse

    {{ $medicos->links() }}
@endsection