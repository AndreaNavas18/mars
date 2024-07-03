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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <title>Header</title> --}}
    
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    {{-- <link rel="manifest" href="/manifest.json"> --}}
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#000000">
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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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