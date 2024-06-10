<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <title>MI MARS VECINO</title>
</head>
<body>
    <div class="header" 
    style="background-color: 
        @can('vista.tendero') #ffc547
        @elsecan('vista.vendedor') #ffc547
        @elsecan('vista.admin') #ffffff 
        @endcan;"
        >
        <nav class="navH">
            <div>
                <ul class="list">
                    @guest
                    <li>
                        <a href="{{ generate_url('login') }}">{{ __('Login') }}</a>
                    </li>
                    @else
                    <li>
                        <form id="logout-form" action="{{ generate_url('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btnH">Logout
                            </button>
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
        
        <main>
            @yield('content')
        </main>
        
      </div>
    </body>
    </html>