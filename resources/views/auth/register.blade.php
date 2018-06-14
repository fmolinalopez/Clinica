@extends('layouts.app')

@section('content')
    @if(Request::get('userType') == "user")
        <div class="container">
            <div class="row justify-content-md-center mt-5">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Registro de Usuario</div>
                        <div class="card-body">
                            <form class="registerForm" role="form" method="POST" action="{{ url('/register') }}">
                                {!! csrf_field() !!}

                                <input type="hidden" name="type" value="false">

                                <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-lg-4 col-form-label text-lg-right">Nombre</label>

                                    <div class="col-lg-6">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" autofocus>

                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                    <label for="lastName"
                                           class="col-lg-4 col-form-label text-lg-right">Apellido</label>

                                    <div class="col-lg-6">
                                        <input id="lastName" type="text" class="form-control" name="lastName"
                                               value="{{ old('lastName') }}" autofocus>

                                        @if ($errors->has('lastName'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('lastName') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('userName') ? ' has-error' : '' }}">
                                    <label for="userName" class="col-lg-4 col-form-label text-lg-right">Nombre de
                                        Usuario</label>

                                    <div class="col-lg-6">
                                        <input id="userName" type="text" class="form-control" name="userName"
                                               value="{{ old('userName') }}" autofocus>

                                        @if ($errors->has('userName'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('userName') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail</label>

                                    <div class="col-lg-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('num_sanitario') ? ' has-error' : '' }}">
                                    <label for="num_sanitario" class="col-lg-4 col-form-label text-lg-right">Nº Sanitario</label>

                                    <div class="col-lg-6">
                                        <input id="num_sanitario" type="text" class="form-control" name="num_sanitario"
                                               value="{{ old('num_sanitario') }}">

                                        @if ($errors->has('num_sanitario'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('num_sanitario') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                                    <label for="birthdate" class="col-lg-4 col-form-label text-lg-right">Fecha de
                                        nacimiento</label>

                                    <div class="col-lg-6">
                                        <input id="birthdate" type="date" class="form-control" name="birthdate"
                                               value="{{ old('birthdate') }}" onblur="calcularEdad()" autofocus>

                                        @if ($errors->has('birthdate'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('birthdate') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('movil') ? ' has-error' : '' }}">
                                    <label for="movil" class="col-lg-4 col-form-label text-lg-right">Nº Teléfono</label>

                                    <div class="col-lg-6">
                                        <input id="movil" type="text" class="form-control" name="movil"
                                               value="{{ old('movil') }}" autofocus>

                                        @if ($errors->has('movil'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('movil') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('dni') ? ' has-error' : '' }}">
                                    <label for="dni" class="col-lg-4 col-form-label text-lg-right">Dni</label>

                                    <div class="col-lg-6">
                                        <input id="dni" type="text" class="form-control" name="dni"
                                               value="{{ old('dni') }}" autofocus>

                                        @if ($errors->has('dni'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('dni') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password"
                                           class="col-lg-4 col-form-label text-lg-right">Contraseña</label>

                                    <div class="col-lg-6">
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    {{--<div class="spinner" hidden>--}}
                                        {{--@include('layouts.spinner')--}}
                                    {{--</div>--}}
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right">Confirmar contraseña</label>

                                    <div class="col-lg-6">
                                        <input
                                                id="password_confirmation"
                                                type="password"
                                                class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                                name="password_confirmation"
                                        >
                                        @if ($errors->has('password_confirmation'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    {{--<div class="spinner" hidden>--}}
                                        {{--@include('layouts.spinner')--}}
                                    {{--</div>--}}
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6 offset-lg-4">
                                        <button type="submit" class="btnRegister btn btn-primary">
                                            Registrarse
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(Request::get('userType') == "medico")
        <div class="container">
            <div class="row justify-content-md-center mt-5">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Registro de Medico</div>
                        <div class="card-body">
                            <form class="registerForm" role="form" method="POST" action="{{ url('/register') }}">
                                {!! csrf_field() !!}

                                <input type="hidden" name="type" value="true">

                                <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-lg-4 col-form-label text-lg-right">Nombre</label>

                                    <div class="col-lg-6">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" autofocus>

                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                    <label for="lastName"
                                           class="col-lg-4 col-form-label text-lg-right">Apellido</label>

                                    <div class="col-lg-6">
                                        <input id="lastName" type="text" class="form-control" name="lastName"
                                               value="{{ old('lastName') }}" autofocus>

                                        @if ($errors->has('lastName'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('lastName') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('userName') ? ' has-error' : '' }}">
                                    <label for="userName" class="col-lg-4 col-form-label text-lg-right">Nombre de
                                        Usuario</label>

                                    <div class="col-lg-6">
                                        <input id="userName" type="text" class="form-control" name="userName"
                                               value="{{ old('userName') }}" autofocus>

                                        @if ($errors->has('userName'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('userName') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail</label>

                                    <div class="col-lg-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('especialidad') ? ' has-error' : '' }}">
                                    <label for="especialidad"
                                           class="col-lg-4 col-form-label text-lg-right">Especialidad</label>

                                    <div class="col-lg-6">
                                        <input id="especialidad" type="text" class="form-control" name="especialidad"
                                               value="{{ old('especialidad') }}" autofocus>

                                        @if ($errors->has('especialidad'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('especialidad') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('num_colegiado') ? ' has-error' : '' }}">
                                    <label for="num_colegiado" class="col-lg-4 col-form-label text-lg-right">Nº de
                                        colegiado</label>

                                    <div class="col-lg-6">
                                        <input id="num_colegiado" type="text" class="form-control" name="num_colegiado"
                                               value="{{ old('num_colegiado') }}" onblur="calcularEdad()" autofocus>

                                        @if ($errors->has('num_colegiado'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('num_colegiado') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('movil') ? ' has-error' : '' }}">
                                    <label for="movil" class="col-lg-4 col-form-label text-lg-right">Nº Teléfono</label>

                                    <div class="col-lg-6">
                                        <input id="movil" type="text" class="form-control" name="movil"
                                               value="{{ old('movil') }}" autofocus>

                                        @if ($errors->has('movil'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('movil') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="spinner" hidden>
                                        @include('layouts.spinner')
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password"
                                           class="col-lg-4 col-form-label text-lg-right">Contraseña</label>

                                    <div class="col-lg-6">
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    {{--<div class="spinner" hidden>--}}
                                        {{--@include('layouts.spinner')--}}
                                    {{--</div>--}}
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right">Confirmar contraseña</label>

                                    <div class="col-lg-6">
                                        <input
                                                type="password"
                                                id="password_confirmation"
                                                class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                                name="password_confirmation"
                                        >
                                        @if ($errors->has('password_confirmation'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    {{--<div class="spinner" hidden>--}}
                                        {{--@include('layouts.spinner')--}}
                                    {{--</div>--}}
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6 offset-lg-4">
                                        <button type="submit" class="btnRegister btn btn-primary">
                                            Registrarse
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @push('scripts')
        <script src="{{ asset('js/validarUser.js') }}" defer></script>
    @endpush
@endsection