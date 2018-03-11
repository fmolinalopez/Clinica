{{ method_field('PATCH') }}
<input type="hidden" name="route" value="personal">
@if(!$user->esMedico)
    <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-lg-12 col-form-label text-center">Nombre</label>

        <div class="col-md-8 centro">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ $user->name }}">

            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row{{ $errors->has('lastName') ? ' has-error' : '' }}">
        <label for="lastName" class="col-lg-12 col-form-label text-center">Apellidos</label>

        <div class="col-md-8 centro">
            <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" placeholder="{{ $user->lastName }}">

            @if ($errors->has('lastName'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('lastName') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('dni') ? ' has-error' : '' }}">
        <label for="dni" class="col-lg-12 col-form-label text-center">Dni</label>

        <div class="col-md-8 centro">
            <input id="dni" type="text" class="form-control" name="dni" placeholder="{{ $user->dni }}">

            @if ($errors->has('dni'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('dni') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('birthdate') ? ' has-error' : '' }}">
        <label for="birthdate" class="col-lg-12 col-form-label text-center">Fecha de nacimiento</label>

        <div class="col-md-8 centro">
            <input id="birthdate" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="birthdate" placeholder="{{ $user->birthdate }}">

            @if ($errors->has('birthdate'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('birthdate') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('movil') ? ' has-error' : '' }}">
        <label for="movil" class="col-lg-12 col-form-label text-center">Nº de movil</label>

        <div class="col-md-8 centro">
            <input id="movil" type="number" class="form-control" name="movil" placeholder="{{ $user->movil }}">

            @if ($errors->has('movil'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('movil') }}</strong>
                </div>
            @endif
        </div>
    </div>
@else
    <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-lg-12 col-form-label text-center">Nombre</label>

        <div class="col-md-8 centro">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ $user->name }}">

            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row{{ $errors->has('lastName') ? ' has-error' : '' }}">
        <label for="lastName" class="col-lg-12 col-form-label text-center">Apellidos</label>

        <div class="col-md-8 centro">
            <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" placeholder="{{ $user->lastName }}">

            @if ($errors->has('lastName'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('lastName') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row{{ $errors->has('movil') ? ' has-error' : '' }}">
        <label for="movil" class="col-lg-12 col-form-label text-center">Nº de movil</label>

        <div class="col-md-8 centro">
            <input id="movil" type="number" class="form-control" name="movil" placeholder="{{ $user->movil }}">

            @if ($errors->has('movil'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('movil') }}</strong>
                </div>
            @endif
        </div>
    </div>
@endif
