@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <h1>Perfil de {{$user->userName}}</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <img src="{{$user->avatar}}" alt="">
                <button class="btn-success">Editar perfil</button>
            </div>
            <div class="col-md-8">
                <p><strong>Nombre:</strong>{{$user->name}}</p>
                <p><strong>Apeliidos:</strong>{{$user->lastName}}</p>
                <p><strong>Nombre de Usuario:</strong>{{ $user['userName'] }}</p>
                <p><strong>Email:</strong>{{$user->email}}</p>
                <p><strong>Nº de tarjeta sanitaria:</strong>{{$user->num_sanitario}}</p>
                <p><strong>Fecha de nacimiento:</strong>{{$user->birthdate}}</p>
                <p><strong>Dni:</strong>{{$user->dni}}</p>
                <p><strong>Movil:</strong>{{$user->movil}}</p>
                <p><strong>Pagina web:</strong>{{$user->website}}</p>
                <p><strong>Sobre ti:</strong>{{$user->about}}</p>
            </div>
        </div>
    </div>
@endsection