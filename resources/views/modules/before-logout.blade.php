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
            }, 4000);
        });
    </script>
</head>
<body>
    <div class="before">
        <img src="{{ asset('images/new/marsCo.png') }}" class="animate__animated animate__bounceInLeft" alt="Avatar">
        <h1 class="animate__animated animate__bounceInRight">¡Con <span style="font-size: 33px;color:#0000a0;font-weight:bold">MARS</span> siempre cumples, siempre ganas!</h1>
    </div>
</body>
</html>
