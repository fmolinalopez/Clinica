@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro de Usuario</div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-lg-4 col-form-label text-lg-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                <label for="lastName" class="col-lg-4 col-form-label text-lg-right">Apellidos</label>

                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}"  autofocus>

                                    @if ($errors->has('lastName'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('userName') ? ' has-error' : '' }}">
                                <label for="userName" class="col-lg-4 col-form-label text-lg-right">Nombre de Usuario</label>

                                <div class="col-md-6">
                                    <input id="userName" type="text" class="form-control" name="userName" value="{{ old('userName') }}"  autofocus>

                                    @if ($errors->has('userName'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('userName') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('num_sanitario') ? ' has-error' : '' }}">
                                <label for="num_sanitario" class="col-lg-4 col-form-label text-lg-right">Nº de Tarjeta Sanitaria</label>

                                <div class="col-md-6">
                                    <input id="num_sanitario" type="text" class="form-control" name="num_sanitario" value="{{ old('num_sanitario') }}"  autofocus>

                                    @if ($errors->has('num_sanitario'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('num_sanitario') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                                <label for="birthdate" class="col-lg-4 col-form-label text-lg-right">Fecha de nacimiento</label>

                                <div class="col-md-6">
                                    <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ old('birthdate') }}" onblur="calcularEdad()"  autofocus>

                                    @if ($errors->has('birthdate'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('birthdate') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div id="dniDiv" hidden class="form-group row{{ $errors->has('dni') ? ' has-error' : '' }}">
                                <label for="dni" class="col-lg-4 col-form-label text-lg-right">Dni (Obligatorio para mayores de 14 años)</label>

                                <div class="col-md-6">
                                    <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}" autofocus>

                                    @if ($errors->has('dni'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('dni') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('movil') ? ' has-error' : '' }}">
                                <label for="movil" class="col-lg-4 col-form-label text-lg-right">Nº Teléfono</label>

                                <div class="col-md-6">
                                    <input id="movil" type="text" class="form-control" name="movil" value="{{ old('movil') }}" autofocus>

                                    @if ($errors->has('movil'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('movil') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-lg-4 col-form-label text-lg-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" >

                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">Confirmar contraseña</label>

                                <div class="col-lg-6">
                                    <input
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
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 offset-lg-4">
                                    <button type="submit" class="btn btn-primary">
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
@endsection