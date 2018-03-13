@extends('layouts.app')

@section('content')
    <div class="col-lg-8 text-center centro mt-5">
        <h1>Enviar un mensaje a {{$medico->name}}</h1>
        <div class="mt-2">
            <form id="messageForm" action="/conversation/{{$medico->name}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                </div>
                <div class="errors alert-danger mb-2">

                </div>
                @if ($errors->has('content'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('content') }}</strong>
                    </div>
                @endif
                <div class="form-group">
                    <button type="submit" id="sendMessage" class="btn btn-primary">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/validarConversation.js') }}" defer></script>
    @endpush
@endsection