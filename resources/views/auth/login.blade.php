@extends('layouts.header')

@section('content')
{{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf --}}

                        {{-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div> --}}
                    {{-- </form>
                </div>
            </div>
        </div>
    </div> --}}
{{-- </div> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="{{ asset('css/tenderos/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>
<body>
    <div id="loading-container">
        <img src="{{ asset('images/new/cargando.gif') }}" class="loading" alt="Cargando">
    </div>
    <div class="fondo">
        <div class="divAma">
            <div class="contenido">
                <div class="logomars animate__animated animate__backInDown">
                    <div class="divImg">
                        <h1 class="MMV">Mi</h1>
                        <img src="{{ asset('images/new/marslogo.svg') }}" class="logo" alt="MARS">
                    </div>
                   <h1 class="MMV1"> Vecino</h1>
                </div>
                <div class="diVeci">
                    <img src="{{ asset('images/new/vecino.png') }}" class="vecino" alt="Vecino">
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="divIngreso">
                    <h1 class="tituloIngreso">Iniciar Sesión</h1>
                        <div class="divinput">
                            <input id="username" name="username" type="text" placeholder="Ingrese su cedula" class="inputIngreso @error('username') is-invalid @enderror" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            <img src="{{ asset('images/new/icon1.png') }}" class="iconocedula" alt="#">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                    <button type="submit" class="btnIngreso animate__animated animate__pulse">Ingresar</button>
                </div>
            </form>
            <div class="divFooter">
                {{-- <img src="{{ secure_asset('images/new/footer.png') }}" class="footer" alt="Footer"> --}}
                &nbsp;
            </div>
        </div>
    </div>

    
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Ocultar la pantalla de carga después de 2 segundos
    setTimeout(function() {
        document.getElementById('loading-container').style.display = 'none';
    }, 2000); // 2000 milisegundos = 2 segundos
});
</script>
@endsection
