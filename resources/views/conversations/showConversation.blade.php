@extends('layouts.app')

@section('content')
    @if($user->esMedico)
        <div class="row mt-5">

        @foreach($user->conversations as $conversation)
            <div class="col-lg-4 centro border-bottom">
                <p>Conversacion con el paciente <a
                            href=/conversation/{{$conversation->id}}/messages>{{\App\Conversation::obtenerPaciente($conversation)->name}} {{\App\Conversation::obtenerPaciente($conversation)->lastName}}</a>
                </p>
            </div>
        @endforeach
    @else
        @foreach($user->conversations as $conversation)
            <div class="col-lg-4 centro border-bottom">
                <p>Conversacion con el doctor <a
                            href=/conversation/{{$conversation->id}}/messages>{{\App\Conversation::obtenerMedico($conversation)->name}} {{\App\Conversation::obtenerMedico($conversation)->lastName}}</a>
                </p>
            </div>
        @endforeach
        </div>
    @endif
@endsection