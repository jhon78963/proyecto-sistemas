<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fleming College | Login</title>
    <link rel="icon" href="/adminlte/images/insginias.ico" type="image/ico" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="/adminlte/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- login -->
    <link rel="icon" type="image/png" href="/loginv1/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/loginv1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/loginv1/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/loginv1/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="/loginv1/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="/loginv1/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="/loginv1/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/loginv1/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="/loginv1/css/util.css">
    <link rel="stylesheet" type="text/css" href="/loginv1/css/main.css">

</head>
<body>
    <div id="app">
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form-title" style="background-image: url(/loginv1/images/bg-01.jpg);">
                        <span class="login100-form-title-1">
                            @yield('title')
                        </span>
                    </div>
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                        <div class="container">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <i class="fa fa-university"></i> <span>Fleming College</span></a>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <main class="py-4">
                        @if (empty(Auth::user()->name))
                            @yield('content')
                        @else
                            <h3 class="text-center"><a href="{{action('HomeController@index')}}">Pagina de inicio</a></h4>
                        @endif
                    </main>
                </div>
            </div>
            <footer class="text-center">
                <p>©2020 All Rights Reserved. Fleming College Privacy and <a href="#">terms</a></p>
            </footer>
        </div>
    </div>

    <!-- scripts -->
    <script src="/loginv1/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="/loginv1/vendor/animsition/js/animsition.min.js"></script>
    <script src="/loginv1/vendor/bootstrap/js/popper.js"></script>
	<script src="/loginv1/vendor/select2/select2.min.js"></script>
	<script src="/loginv1/vendor/daterangepicker/moment.min.js"></script>
	<script src="/loginv1/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="/loginv1/vendor/countdowntime/countdowntime.js"></script>
    <script src="/loginv1/js/main.js"></script>

</body>
</html>
