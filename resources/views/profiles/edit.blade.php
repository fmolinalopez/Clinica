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
                        @if(!$user->esMedico)
                            <th id="additional"
                                class="{{ Request::is('profile/additional') ? 'bg-light' : ''  }} text-primary" scope="col">
                                Informacion Adicional
                            </th>
                        @endif
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

                </form>
            </div>
        </div>
        <div class="card-footer bg-primary">
            <button id="editButton" class="btn btn-primary">Actualizar perfil</button>
            <a href="/profile"><button class="btn btn-primary">Volver al perfil</button></a>
            <button id="btnDeleteUser" class="btn btn-danger">Borrar Usuario</button>
            <div class="modal fade" id="borrarProfile" tabindex="-1" data-backdrop="static" data-show="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ejemplo2Label">¿Cancelar cita?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Esta accion no se puede deshacer, ¿esta seguro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="back" class="btn btn-primary">Volver atras</button>
                            <form action="/profile/delete" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" id="accept" class="btn btn-danger">Borrar Usuario</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/editarPerfil.js') }}" defer></script>
        <script src="{{ asset('js/modalProfile.js') }}" defer></script>
    @endpush
@endsection