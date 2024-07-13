@extends('layouts.appT')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-    width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/tenderos/dashboard.css') }}">
    <title>Tendero</title>
</head>
<body>
    <div style="margin-bottom: 50px"> 
        <div class="divPTT">
            <h1 class="punTT">${{ number_format(auth()->user()->tendero->cuota_mes, 0, ',', '.') }}</h1>
            <h2 class="tituTTT">META PERIODO 1</h2>
        </div>
        <ul>
            <li class="videoPromo">
                <h2>Video Promocional</h2>
                <video width="320" height="240" controls>
                    <source src="{{ asset('images/new/videoPromocional.mp4') }}" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
            </li>
        </ul>
    </div>
</body>
</html>
@endsection