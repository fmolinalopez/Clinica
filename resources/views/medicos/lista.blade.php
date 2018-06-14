@extends('layouts.app')
@section('content')
    @foreach($medicos as $medico)
        @include('medicos.medico')
    @endforeach
    <div class="centro">{{ $medicos->links('pagination::bootstrap-4') }}</div>
@endsection