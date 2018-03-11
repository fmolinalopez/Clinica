@extends('layouts.app')

@section('content')
    @if($user->esMedico)
        @foreach($user->conversations as $conversation)
            <p>Conversacion con el paciente <a
                        href=/conversation/{{$conversation->id}}/messages>{{\App\Conversation::obtenerPaciente($conversation)->name}} {{\App\Conversation::obtenerPaciente($conversation)->lastName}}</a>
            </p>
        @endforeach
    @else
        @foreach($user->conversations as $conversation)
            <p>Conversacion con el doctor <a
                        href=/conversation/{{$conversation->id}}/messages>{{\App\Conversation::obtenerMedico($conversation)->name}} {{\App\Conversation::obtenerMedico($conversation)->lastName}}</a>
            </p>
        @endforeach
    @endif
@endsection