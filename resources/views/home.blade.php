@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header text-center titulo">Lista de Medicos</h1>
                </div>
            </div>
        </div>

        @foreach($medicos as $medico)
            @include('medicos.medico')
        @endforeach
        <div class="centro">{{ $medicos->links('pagination::bootstrap-4') }}</div>
    </div>
@endsection
