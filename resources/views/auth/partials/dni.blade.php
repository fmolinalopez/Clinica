<div id="dniDiv"
     class="form-group row{{ $errors->has('dni') ? ' has-error' : '' }}">
    <label for="dni" class="col-lg-4 col-form-label text-lg-right">Dni (Obligatorio para
        mayores de 14 años)</label>

    <div class="col-lg-6">
        <input id="dni" type="text" class="form-control" name="dni"
               value="{{ old('dni') }}" autofocus>

        @if ($errors->has('dni'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('dni') }}</strong>
            </div>
        @endif
    </div>
</div>