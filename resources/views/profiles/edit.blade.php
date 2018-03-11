@extends('layouts.app')

@section('content')
    <div class="card text-center mt-5">
        <div class="card-header bg-primary">
            <h1>Edita tu perfil</h1>
            <div class="col-lg-12">
                <table class="table mt-4">
                    <thead class="table-bordered table-striped">
                    <tr class="thead-dark">
                        <th id="personal" class="{{ Request::is('profile/personal') ? 'bg-light' : ''  }} text-primary"
                            scope="col">Informacion Personal
                        </th>
                        <th id="account" class="{{ Request::is('profile/account') ? 'bg-light' : ''  }} text-primary"
                            scope="col">Cuenta
                        </th>
                        <th id="avatar" class="{{ Request::is('profile/avatar') ? 'bg-light' : ''  }} text-primary"
                            scope="col">Avatar
                        </th>
                        <th id="additional"
                            class="{{ Request::is('profile/additional') ? 'bg-light' : ''  }} text-primary" scope="col">
                            Informacion Adicional
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                @if( session('exito'))
                    <h1 class="alert-success">{{session('exito')}}</h1>
                @elseif( session('error'))
                    <h1 class="alert-danger">{{session('error')}}</h1>
                @endif
                @isset($errors)
                    @foreach($errors as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @endisset
                <form id="editForm" action="/profile/edit" method="POST">
                    {{ csrf_field() }}

                    <div id="chosenInfo"></div>
                    {{--@if( Request::is('profile/personal'))--}}
                    {{--@include('profiles.partials.personal')--}}
                    {{--@elseif( Request::is('profile/account'))--}}
                    {{--@include('profiles.partials.account')--}}
                    {{--@elseif( Request::is('profile/avatar'))--}}
                    {{--@include('profiles.partials.avatar')--}}
                    {{--@elseif( Request::is('profile/additional'))--}}
                    {{--@include('profiles.partials.additional')--}}
                    {{--@endif--}}
                </form>
            </div>
        </div>
        <div class="card-footer bg-primary">
            <button id="editButton" class="btn btn-primary">Actualizar perfil</button>
            <a href="/profile"><button class="btn btn-primary">Volver al perfil</button></a>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/editarPerfil.js') }}" defer></script>
    @endpush
@endsection