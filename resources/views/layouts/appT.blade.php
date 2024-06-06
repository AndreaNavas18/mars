<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/menuT.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <title>Header</title> --}}
</head>
<body>
<div class="headerCompleto">
        <div class="soloHeaderImg">
            <div class="soloHeader">
                <div class="iconosHH">
                    <img src="{{ asset('images/new/menu1.png') }}" class="menuTT" alt="Menu" id="menuHamburguesa">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/new/inicio.png') }}" class="menuTT" alt="Menu" id="menuAjustes">
                    </a> 
                </div>
                <div class="avatarHH">
                    <img src="{{ asset('images/new/vendedor2.png') }}" class="avatarTT" alt="Avatar">
                    <h3 class="nombreHH">{{ ucfirst(auth()->user()->name) }}</h3>
                    {{-- <h3 class="nombreHH">Hola, tu</h3> --}}
                </div>
            </div>
        </div>
        <main class="mainHH">
            @yield('content')
        </main>
    </div>
    <div class="menuDesplegable" id="menuDesplegable">
        <ul class="list">
            @guest
            <li>
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @else
            <li>
                <form id="logout-form" action="{{ secure_url('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btnH">Cerrar sesión
                    </button>
                </form>
            </li>
            @endguest
        </ul>
    </div>
</body>
</html>
