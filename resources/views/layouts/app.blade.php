<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clinica.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> <!-- Cdn del componente multiselect -->
    @stack('scripts')
</head>
<body class="back">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @if (!Auth::guest())
                <div class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <ul class="navbar-nav">
                        {{--<li class="nav-item active"><a href="{{ route('addMedico') }}" class="nav-link">Añadir Medico</a></li>--}}
                        @if(!Auth::user()->esMedico)
                            <li class="nav-item active"><a href="{{ route('askCita') }}" class="nav-link">Pedir Cita</a></li>
                        @endif
                    </ul>
                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->userName }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container main-area mb-5">
            @yield('content')
        </div>
    </div>

    <footer class="fixed-bottom bg-primary">
        <div class="row">
            <div class="col-lg-2 text-left">
                <h1 class="titulo"><a href="/"><strong>Clinica</strong></a></h1>
            </div>
            <div class="col-lg-10 text-right">
                    <div class="text-right">
                        <a href="https://github.com/fmolinalopez/Clinica"><img src="{{ asset('images/github.svg') }}" class="footerIcon" alt="github"></a>
                    </div>
                    <div class="text-right mt-1">
                        <a href="https://www.facebook.com/"><img src="{{ asset('images/facebook.png') }}" class="footerIcon" alt="facebook"></a>
                    </div>
                    <div class="text-right mt-1">
                        <a href="https://www.twitter.com"><img src="{{ asset('images/twitter.png') }}" class="footerIcon" alt="twitter"></a>
                    </div>
                </div>
        </div>
        <p class="text-center mt-3"> Copyright © All right reserved. </p>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/edad.js') }}"></script>
    <script src="{{ asset('js/collapse.js') }}"></script>

</body>

</html>
