@extends('layouts.app')

@section('content')
    <div class="col-lg-8 text-center centro mt-5">
        <h1>Enviar un mensaje a {{$medico->name}}</h1>
        <div class="mt-2">
            <form action="/conversation/{{$medico->name}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection