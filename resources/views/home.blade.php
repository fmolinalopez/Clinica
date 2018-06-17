@extends('layouts.app')

@section('content')
    @guest
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header text-center titulo">Bienvenido a la aplicación</h1>
                    <h3 class="text-center">¿Eres médico o paciente?</h3>
                </div>
            </div>
        </div>

        <div class="row mt-5 text-center">
            <div id="cardMedico" class="col-lg-6 mb-1">
                <div class="card-header bg-primary">
                    <button id="chooseMedico" class="btn btn-primary">
                        <h1 class="text-light">Medico</h1>
                    </button>
                </div>
                <div class="card-body">
                    <div class="collapse multi-collapse" id="medicoCollapse">
                        <div class="card card-body">
                            ¿Tienes ya una cuenta?<a id="loginMedico" href="#">Logeate!</a>
                            <form id="medicoForm" class="form-horizontal collapse multi-collapse mt-2" method="POST"
                                  action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="emailMedico" class="col-lg-4 col-form-label text-lg-right">E-Mail</label>

                                    <div class="col-lg-6">
                                        <input
                                                id="emailMedico"
                                                type="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email"
                                                value="{{ old('email') }}"
                                                autofocus
                                        >

                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="passwordMedico"
                                           class="col-lg-4 col-form-label text-lg-right">Contraseña</label>

                                    <div class="col-lg-6">
                                        <input
                                                id="passwordMedico"
                                                type="password"
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password"
                                        >

                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-8 offset-lg-4">
                                        <button type="submit" class="btn btn-primary">
                                            Entrar
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            ¿Olvidaste la contraseña?
                                        </a>
                                    </div>
                                </div>
                            </form>
                            ¿No estas registrado?<a href="/register?userType=medico">Registrate!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="cardUser" class="col-lg-6">
                <div class="card-header bg-primary">
                    <button id="chooseUser" class="btn btn-primary">
                        <h1 class="text-light">Paciente</h1>
                    </button>
                </div>
                <div class="card-body">
                    <div class="collapse multi-collapse" id="userCollapse">
                        <div class="card card-body">
                            ¿Tienes ya una cuenta?<a id="loginUser" href="#">Logeate!</a>
                            <form id="userForm" class="form-horizontal collapse multi-collapse mt-2" method="POST"
                                  action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="emailUser" class="col-lg-4 col-form-label text-lg-right">E-Mail</label>

                                    <div class="col-lg-6">
                                        <input
                                                id="emailUser"
                                                type="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email"
                                                value="{{ old('email') }}"
                                                autofocus
                                        >

                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="passwordUser"
                                           class="col-lg-4 col-form-label text-lg-right">Contraseña</label>

                                    <div class="col-lg-6">
                                        <input
                                                id="passwordUser"
                                                type="password"
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password"
                                        >

                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-8 offset-lg-4">
                                        <button type="submit" class="btn btn-primary">
                                            Entrar
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            ¿Olvidaste la contraseña?
                                        </a>
                                    </div>
                                </div>
                            </form>
                            ¿No estas registrado?<a href="/register?userType=user">Registrate!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
    @auth
        @if( session('error'))
            <div class="text-center alert-danger mt-2">
                <h1>{{session('error')}}</h1>
            </div>
        @endif

        <div class="container text-center">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header text-center titulo">Bienvenido {{ $user->userName}}</h1>
                </div>
            </div>
            @if($user->esMedico)
                @if($user->clinicas->count() <= 0)
                    <p>Aun no has seleccionado ninguna clinica, no podras recibir mensajes ni citas hasta que
                        selecciones al
                        menos una </p>
                    <a href="/{{$user->userName}}/clinicas/elegir">Haz click aqui para seleccionar tus clinicas de
                        trabajo</a>
                @else
                <div class="row">
                    <div class="col-lg-12">
                        <p>¿Que desea hacer?</p>
                    </div>

                    <div class="list-group col-lg-6">
                        <a href="/profile" class="list-group-item list-group-item-action">Ir al perfil</a>
                        <a href="citas" class="list-group-item list-group-item-action mt-2">Mostrar citas</a>
                    </div>

                    <div class="list-group col-lg-6">
                        <a href="/{{$user->userName}}/clinicas/elegir" class="list-group-item list-group-item-action">Modificar Clinicas</a>
                        <a href="/conversations" class="list-group-item list-group-item-action mt-2">Mostrar Conversaciones</a>
                    </div>

                    <div class="list-group col-lg-6 mt-2 centro">
                        <a href="/medicos" class="list-group-item list-group-item-action">Ver lista de medicos</a>
                    </div>
                </div>
                @endif
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <p>¿Que desea hacer?</p>
                    </div>

                    <div class="list-group col-lg-6">
                        <a href="/profile" class="list-group-item list-group-item-action">Ir al perfil</a>
                        <a href="citas" class="list-group-item list-group-item-action mt-2">Mostrar citas</a>
                    </div>

                    <div class="list-group col-lg-6">
                        <a href="/cita" class="list-group-item list-group-item-action">Pedir cita</a>
                        <a href="/conversations" class="list-group-item list-group-item-action mt-2">Mostrar Conversaciones</a>
                    </div>

                    <div class="list-group col-lg-6 mt-2 centro">
                            <a href="/medicos" class="list-group-item list-group-item-action">Ver lista de medicos</a>
                    </div>
                </div>
            @endif
        </div>

    @endauth

@endsection
