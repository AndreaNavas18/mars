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
    @laravelPWA
</head>
<body>
    @can('vista.tendero')
    <div>
       @include('layouts.appT')
    </div>
    @endcan

    @can('vista.vendedor')
    <div>
        @include('layouts.appT')
    </div>
    @endcan

    @can('vista.admin')
    <div>
        @include('layouts.appA')
    </div>
    @endcan

</body>
</html>