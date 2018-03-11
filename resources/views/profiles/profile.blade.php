@extends('layouts.app')

@section('content')

    <div class="card text-center mt-5">
        <div class="card-header bg-primary">
            <h1 class="text-light">Perfil de {{ $user->userName }}</h1>
        </div>
        <div class="card-body">
            @if(!$user->esMedico)
                <div class="row prof">
                    <div class="col-lg-4">
                        <img class="avatar" src="{{$user->avatar}}" alt="">
                    </div>
                    <div class="col text-center">
                        <h4><span class="badge badge-secondary bg-primary">Nombre:</span></h4>
                        <p>{{$user->name}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Nombre de Usuario:</span></h4>
                        <p>{{$user->userName}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Dni:</span></h4>
                        <p>{{$user->dni}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Pagina web:</span></h4>
                        <p>{{$user->website}}</p>
                    </div>
                    <div class="col text-center">
                        <h4><span class="badge badge-secondary bg-primary">Apellidos:</span></h4>
                        <p>{{$user->lastName}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Email:</span></h4>
                        <p>{{$user->email}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Fecha de nacimiento:</span></h4>
                        <p>{{$user->birthdate}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Movil:</span></h4>
                        <p>{{$user->movil}}</p>
                    </div>
                </div>
                <div class="text-center">
                    <h4><span class="badge badge-secondary bg-primary">Sobre ti:</span></h4>
                    <p>{{$user->about}}</p>
                </div>
            @else
                <div class="row prof">
                    <div class="col-lg-4">
                        <img class="avatar" src="{{$user->avatar}}" alt="">
                    </div>
                    <div class="col text-center">
                        <h4><span class="badge badge-secondary bg-primary">Nombre:</span></h4>
                        <p>{{$user->name}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Nombre de Usuario:</span></h4>
                        <p>{{$user->userName}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Especialidad:</span></h4>
                        <p>{{$user->especialidad}}</p>
                    </div>
                    <div class="col text-center">
                        <h4><span class="badge badge-secondary bg-primary">Apellidos:</span></h4>
                        <p>{{$user->lastName}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Email:</span></h4>
                        <p>{{$user->email}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Nº de colegiado:</span></h4>
                        <p>{{$user->num_colegiado}}</p>
                        <h4><span class="badge badge-secondary bg-primary">Movil:</span></h4>
                        <p>{{$user->movil}}</p>
                    </div>
                </div>
                <div class="text-center">
                    <h4><span class="badge badge-secondary bg-primary">Clinicas:</span></h4>
                    @foreach($user->clinicas as $clinica)
                        <div class="col">
                            <a href="#">{{$clinica->nombre}}</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        @if( Request::is('profile'))
            <div class="card-footer bg-primary">
                <a href="/profile/edit">
                    <button class="btn btn-primary">Editar perfil</button>
                </a>
                <a href="/citas">
                    <button class="btn btn-primary">Mostrar Citas</button>
                </a>
            </div>
        @endif
    </div>
@endsection