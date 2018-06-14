@extends('layouts.app')

@section('content')
    @if($user->esMedico)
        <div class="row mt-5">

            @forelse($user->conversations as $conversation)
                <div class="col-lg-4 centro border-bottom">
                    <p>Conversacion con el paciente {{\App\Conversation::obtenerPaciente($conversation)->name}} {{\App\Conversation::obtenerPaciente($conversation)->lastName}}</p>
                    <a href=/conversation/{{$conversation->id}}/messages>
                        <button class="btn btn-primary">
                        Ir a la conversacion
                        </button>
                    </a>
                </div>
            @empty
                <div class="text-center mt-5">
                    <h1>No existe ninguna conversacion</h1>
                </div>
            @endforelse
            @else
                @forelse($user->conversations as $conversation)
                    <div class="col-lg-4 centro border-bottom">
                        <p>Conversacion con el doctor {{\App\Conversation::obtenerMedico($conversation)->name}} {{\App\Conversation::obtenerMedico($conversation)->lastName}}</p>
                        <a href=/conversation/{{$conversation->id}}/messages>
                            <button class="btn btn-primary">
                                Ir a la conversacion
                            </button>
                        </a>
                    </div>
                @empty
                    <div class="text-center mt-5">
                        <h1>No existe ninguna conversacion</h1>
                    </div>
                @endforelse
        </div>
    @endif
@endsection