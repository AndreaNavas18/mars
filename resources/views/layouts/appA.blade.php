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
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- <title>Header</title> --}}
</head>
<body>
    <div class="headerCompletoAdmin" >
        <div class="soloHeaderImgAdmin">
            <div class="soloHeaderAdmin">
                <div class="iconosHH">
                    <img src="{{ asset('images/new/menu1.png') }}" class="menuTTAdmin" alt="Menu" id="menuHamburguesa">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/new/inicio.png') }}" class="menuTT" alt="Menu" id="menuAjustes">
                    </a> 
                </div>
                @include('layouts.encabezado')
                <div class="avatarHH">
                    <img src="{{ asset('images/new/vendedor2.jpg') }}" class="avatarTT" alt="Avatar">
                    {{-- <h3 class="nombreHH">Hola, tu</h3> --}}
                </div>
            </div>
        </div>
        <main class="mainHHAdmin" style="margin-bottom: 20px">
            @yield('content')
        </main>
        {{-- <div style="position:absolute;bottom:0;width:100%"> --}}
        <div style="margin-top: auto;width:100%">
            @include('modules.footer')
        </div>
    </div>
    <div class="whatsapp-widget">
        <a href="https://wa.link/j4exmk" target="_blank">
            <img class="iconoFooter" src="{{asset('images/new/wp2.png')}}" alt="WhatsApp">
        </a>
    </div>
    <div class="menuDesplegable" id="menuDesplegable">
        <ul class="list">
            @guest
            <li>
                <a href="{{ generate_url('login') }}">{{ __('Login') }}</a>
            </li>
            @else
            <li>
                <form id="logout-form" action="{{ generate_url('logout') }}" method="POST">
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