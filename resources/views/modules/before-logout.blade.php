<!-- resources/views/modules/before-logout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Saliendo</title>
    <style>
        body {
            height: 100vh;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                window.location.href = '{{ route('login') }}';
            }, 
            10000);
        });
    </script>
</head>
<body>
    <video autoplay muted loop id="backgroundVideo">
        <source src="{{ asset('videos/fondoanimado.mp4') }}" type="video/mp4">
        Tu navegador no soporta la etiqueta de video.
    </video>
    <div class="before">
        <img src="{{ asset('images/new/marsCo.png') }}" class="avatar2 animate__animated animate__bounceInLeft" alt="Avatar">
        <h3 class="eslEnc2 animate__animated animate__bounceInRight">¡Con 
            <img src="{{ asset('images/new/marslogo.svg') }}" class="logoEnc2" alt="Mars"> 
            siempre cumples, <br> siempre ganas!</h3>
    </div>
</body>
</html>
