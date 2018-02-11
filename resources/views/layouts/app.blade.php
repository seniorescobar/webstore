<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Spletna Trgovina</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/') }}">Spletna trgovina</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guard('administrator')->check())
                            <li><a href="{{ route('administrator.profile') }}">{{ Auth::user()->first_name }}</a></li>
                            <li><a href="{{ route('logout') }}">Odjava</a></li>
                        @elseif (Auth::guard('seller')->check())
                            <li><a href="{{ route('seller.profile') }}">{{ Auth::user()->first_name }}</a></li>
                            <li><a href="{{ route('logout') }}">Odjava</a></li>
                        @elseif (Auth::guard('customer')->check())
                            <li><a href="{{ route('customer.profile') }}">{{ Auth::user()->first_name }}</a></li>
                            <li><a href="{{ route('logout') }}">Odjava</a></li>
                        @else
                            <li><a href="{{ route('customer.login') }}">Prijava</a></li>
                            <li><a href="{{ route('customer.register') }}">Registracija</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
