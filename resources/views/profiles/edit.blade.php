@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table class="table mt-4">
                <thead class="table-bordered table-striped">
                  <tr class="thead-dark">
                      <th id="personal" class="{{ Request::is('profile/personal') ? 'bg-light' : ''  }}" scope="col"><a href="#">Informacion Personal</a></th>
                      <th id="account" class="{{ Request::is('profile/account') ? 'bg-light' : ''  }}" scope="col"><a href="#">Cuenta</a></th>
                      <th id="avatar" class="{{ Request::is('profile/avatar') ? 'bg-light' : ''  }}" scope="col"><a href="#">Avatar</a></th>
                      <th id="additional" class="{{ Request::is('profile/additional') ? 'bg-light' : ''  }}" scope="col"><a href="#">Informacion Adicional</a></th>
                  </tr>
                </thead>
            </table>
        </div>
        <div class="col-lg-12">
            @if( session('exito'))

            @elseif( session('error'))

            @endif
            <form action="{{ Request::url() }}" method="POST">
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
    @push('scripts')
        <script src="{{ asset('js/editarPerfil.js') }}" defer></script>
    @endpush
@endsection