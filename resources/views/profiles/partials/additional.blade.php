{{ method_field('PATCH') }}
<input type="hidden" name="route" value="additional">
<div class="form-group row{{ $errors->has('website') ? ' has-error' : '' }}">
    <label for="website" class="col-lg-12 col-form-label text-center">Pagina web:</label>

    <div class="col-md-8 centro">
        <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}"  placeholder="{{ $user->website }}">

        @if ($errors->has('website'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('website') }}</strong>
            </div>
        @endif
    </div>
</div>

<div class="form-group row{{ $errors->has('about') ? ' has-error' : '' }}">
    <label for="about" class="col-lg-12 col-form-label text-center">Sobre ti:</label>

    <div class="col-md-8 centro">
        <textarea class="form-control" name="about" id="about" rows="5"></textarea>

        @if ($errors->has('about'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('about') }}</strong>
            </div>
        @endif
    </div>
</div>
