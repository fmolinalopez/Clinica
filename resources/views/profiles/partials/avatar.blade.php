{{ method_field('PATCH') }}
<input type="hidden" name="route" value="avatar">
<div class="form-group row{{ $errors->has('userName') ? ' has-error' : '' }}">

    <label for="avatar" class="col-lg-12 col-form-label text-center">Añadir nuevo avatar</label>

    <div class="col-md-8 centro">
        <input id="avatar" type="text" class="form-control" name="avatar">

        @if ($errors->has('avatar'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('avatar') }}</strong>
            </div>
        @endif
    </div>

</div>
