@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">
        @if($clinicas->count() > 0)
            <form action="" method="post">
                {{csrf_field()}}
                <div class="form-group  {{$errors->has('clinicas') ? ' has-error' : ''}}">
                    <label for="clinicas"><h1>Elige las clinicas a las que perteneces</h1></label><br>
                    <select class="js-example-basic-multiple" name="clinicas[]" id="clinicas" multiple="multiple">
                        @foreach($clinicas as $clinica)
                            <option value="{{$clinica->id}}" >{{$clinica->nombre}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('clinicas'))
                        @foreach($errors->get('clinicas') as $message)
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Añadir clinicas
                    </button>
                </div>
            </form>
        @else
            <div class="container">
                <h1>No hay clinicas para mostrar</h1>
            </div>
        @endif
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" defer></script> <!-- Cdn del componente multiselect-->
        <script src="{{ asset('js/multiselect.js') }}" defer></script>
    @endpush
@endsection