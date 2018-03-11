@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        @foreach($messages as $message)
            <div class="col-7 centro">
                <p class="border-bottom">{{\App\Message::obtenerNombreUsuario($message->user_id)->name}}</p>
                <p class="text-center">{{$message->message}}</p>
            </div>
        @endforeach
        <div class="col-lg-12 text-center">
            @if($esMedico)
                <a href="/conversation/{{\App\Conversation::obtenerPaciente($conversation)->name}}">Responder</a>
            @else
                <a href="/conversation/{{\App\Conversation::obtenerMedico($conversation)->name}}">Responder</a>
            @endif
        </div>
    </div>
@endsection