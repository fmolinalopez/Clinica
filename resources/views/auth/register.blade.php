@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form id="formulario"  class="form-horizontal" method="POST"  action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control" name="name" value="{{ old('name') }}"  autofocus>

                                    <div class="error bg-danger">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>

                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                <label for="lastName" class="col-md-4 control-label">Last Name:</label>

                                <div class="col-md-6">
                                    <input id="lastName"
                                           type="text"
                                           class="form-control" name="lastName" value="{{ old('lastName') }}"  autofocus>

                                    <div class="error bg-danger">
                                        @if ($errors->has('lastName'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>

                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('userName') ? ' has-error' : '' }}">
                                <label for="userName" class="col-md-4 control-label">User Name:</label>

                                <div class="col-md-6">
                                    <input id="userName"
                                           type="text"
                                           class="form-control" name="userName" value="{{ old('userName') }}"  autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input
                                            id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                    <div class="error bg-danger">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('num_sanitario') ? ' has-error' : '' }}">
                                <label for="num_sanitario" class="col-md-4 control-label">Numero Tarjeta Sanitaria</label>

                                <div class="col-md-6">
                                    <input id="num_sanitario"
                                           type="text"
                                           class="form-control" name="num_sanitario" value="{{ old('num_sanitario') }}"  >

                                    <div class="error bg-danger">
                                        @if ($errors->has('num_sanitario'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('num_sanitario') }}</strong>
                                    </span>

                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                                <label for="birthdate" class="col-md-4 control-label">Fecha de nacimiento</label>

                                <div class="col-md-6">
                                    <input id="birthdate"
                                           type="date"
                                           onblur="calcularEdad()"
                                           class="form-control" name="birthdate" value="{{ old('birthdate') }}"  >

                                    <div class="error bg-danger">
                                        @if ($errors->has('birthdate'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>

                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="dniDiv" hidden class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                                <label for="dni" class="col-md-4 control-label">Dni (Obligatorio para mayores de 14 años)</label>

                                <div class="col-md-6">
                                    <input id="dni"
                                           type="text"
                                           class="form-control" name="dni" value="{{ old('dni') }}"  >

                                    <div class="error bg-danger">
                                        @if ($errors->has('dni'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>

                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('movil') ? ' has-error' : '' }}">
                                <label for="movil" class="col-md-4 control-label">Nº tlf movil</label>

                                <div class="col-md-6">
                                    <input id="movil"
                                           type="text"
                                           class="form-control" name="movil" value="{{ old('movil') }}"  >

                                    <div class="error bg-danger">
                                        @if ($errors->has('movil'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('movil') }}</strong>
                                    </span>

                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" >

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button id="botonFormulario" type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/validacion.js') }}"></script>
    @endpush
@endsection
