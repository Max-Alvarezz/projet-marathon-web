<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}" >
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="/resources/" rel="stylesheet"> 
    <!-- Styles -->

</head>
<body>
<!-- Authentication Links -->
<header>
<nav class="navbar">
    <ul class="navbar-ul">
            <img src="{{ asset('/img/logo.png') }}"></img>
       
        <div class="rightside-nav">
        <form class="li-item"> <input type="text" placeholder="Rechercher.."></form>

        <li class="li-item"><a href="{{ url('/') }}">ACCUEIL</a></li>
        <li class="li-item"><a href="{{ route('listeSeries') }}">LES SERIES</a></li>
        @guest
            <li class="li-item"><a href="{{ route('login') }}">CONNEXION</a></li>
            <li class="li-item"><a href="{{ route('register') }}">INSCRIPTION</a></li>
        @else
            <li class="li-item"><a href="/profil">PROFIL {{ Auth::user()->name }}</a></li>
            <!--@if (Auth::user())
            @endif -->
            <li class="li-item"><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    DECONNEXION
                </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endguest
        </div>
    </ul>
</nav>
</header>
<div id="main">
    @yield('content')
</div>
<!-- Scripts -->
</body>
</html>