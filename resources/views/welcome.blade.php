<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/tenderos/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    {{-- <link rel="manifest" href="/manifest.json"> --}}
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <meta name="theme-color" content="#000000">

    <title>Inicio</title>
</head>
<body style="margin: 0px">
    <div class="fondoImg">
        <div class="fondoEnc">
            <div class="bienvenn">
                {{-- <img src="{{ asset('images/new/vecino.png') }}" class="vecinoTT animate__animated animate__flipInY" alt="Vecino"> --}}
                <h1 class="nuevoTT animate__animated animate__backInDown">Bienvenido</h1>
                <h2 class="nuevo2TT animate__animated animate__backInDown">a Mi <span class="marss">Mars</span> Vecino</h2>
                <a href="{{ route('login.token', ['token' => 'abc123'])}}" class="btnTT animate__animated animate__bounceInUp">Ingresar</a>
            </div>

        </div>
    </div>
    
</body>
</html>

<script>
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', function() {
        navigator.serviceWorker.register('/serviceworker.js').then(function(registration) {
          console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }, function(err) {
          console.log('ServiceWorker registration failed: ', err);
        });
      });
    }
</script>