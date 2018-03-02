{{ method_field('PATCH') }}
<div class="form-group row{{ $errors->has('userName') ? ' has-error' : '' }}">
    <label for="userName" class="col-lg-12 col-form-label text-center">Nombre de Usuario</label>

    <div class="col-md-8 centro">
        <input id="userName" type="text" class="form-control" name="userName" value="{{ old('userName') }}"  autofocus>

        @if ($errors->has('userName'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('userName') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-lg-12 col-form-label text-center">E-Mail</label>

    <div class="col-md-8 centro">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

        @if ($errors->has('email'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group row{{ $errors->has('current_password') ? ' has-error' : '' }}">
    <label for="current_password" class="col-lg-12 col-form-label text-center">Contraseña actual</label><br>

    <div class="col-md-8 centro">
        <input id="current_password" type="password" class="form-control" name="current_password" >

        @if ($errors->has('current_password'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('current_password') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-lg-12 col-form-label text-center">Nueva contraseña</label><br>

    <div class="col-md-8 centro">
        <input id="password" type="password" class="form-control" name="password" >

        @if ($errors->has('password'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label class="col-lg-12 col-form-label text-center">Confirmar contraseña</label>

    <div class="col-lg-8 centro">
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

<div class="text-center">
    <button class="btn btn-primary" type="submit">Actualizar</button>
</div>