@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table class="table mt-4">
                <thead class="table-bordered table-striped">
                  <tr class="thead-dark">
                      <th class="{{ Request::is('profile/personal') ? 'bg-light' : ''  }}" scope="col"><a href="{{ route('profile.personal') }}">Informacion Personal</a></th>
                      <th class="{{ Request::is('profile/account') ? 'bg-light' : ''  }}" scope="col"><a href="{{ route('profile.account') }}">Cuenta</a></th>
                      <th class="{{ Request::is('profile/avatar') ? 'bg-light' : ''  }}" scope="col"><a href="{{ route('profile.avatar') }}">Avatar</a></th>
                      <th class="{{ Request::is('profile/additional') ? 'bg-light' : ''  }}" scope="col"><a href="{{ route('profile.additional') }}">Informacion Adicional</a></th>
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

                @if( Request::is('profile/personal'))
                    @include('profiles.partials.personal')
                @elseif( Request::is('profile/account'))
                    @include('profiles.partials.account')
                @elseif( Request::is('profile/avatar'))
                    @include('profiles.partials.avatar')
                @elseif( Request::is('profile/additional'))
                    @include('profiles.partials.additional')
                @endif
            </form>
        </div>
    </div>
@endsection