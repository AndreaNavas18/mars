<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/tenderos/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>Ingreso</title>
</head>
    
    <body style="margin: 0px;background-color: #ffc547;">
    <div class="fondoImg">
        <div class="fondoEnc">
            <div class="bienvenn">
                <div class="inicioTTT">
                    <h1 class="nuevoTT animate__animated animate__backInDown">Bienvenido</h1>
                    <h2 class="nuevo2TT animate__animated animate__backInDown">a Mi Vecino <span class="marss">Mars</span> </h2>
                    <img src="{{ asset('images/new/marsCo.png') }}" class="vecinoTT animate__animated animate__flipInY" alt="Vecino">
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->query('token') }}">
                    <div class="divIngresoTT">
                        <h1 class="nuevo3TT">Iniciar Sesión</h1>
                        <label for="username">
                            <h3 class="labelTT">Ingrese su cédula</h3>
                        </label>
                            <div class="divinput">
                                <input id="username" name="username" type="text" class="inputIngresoTT @error('username') is-invalid @enderror" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                <img src="{{ asset('images/new/icon2.png') }}" class="iconocedulaTT" alt="#">
                                @if (session('error'))
                                <div class="">
                                    {{ session('error') }}
                                </div>
                                @endif
                            </div>
                            {{-- <div class="divinput2">
                                <input id="password" name="password" type="password" placeholder="Razón social" class="inputIngreso2 @error('password') is-invalid @enderror" required autocomplete="current-password" >
                                <img src="{{ asset('images/new/tienda.png') }}" class="iconotienda" alt="#">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div> --}}
                        <button type="submit" class="btnIngresoTT animate__animated animate__pulse">Ingresar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
</body>
</html>