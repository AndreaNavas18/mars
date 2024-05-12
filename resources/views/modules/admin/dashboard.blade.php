@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Inicio Administrador</title>

    <div class="fondoAdmin">
        <div class="header2Admin">
            <h1 class="titleAdmin">Bienvenido Administrador</h1>
        </div>
        
        <div class="segDivAdmin">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h2 class="title2Admin">Qué desea hacer hoy?</h2>
            <div class="obss" id="menuObs">
                <a href="{{ route('obs.tenderos')}}" id="botonObs" class="botonObs">Ver observaciones</a>
            </div>
            <div class="creacionn" id="menuCrear">
                <a href="{{ route('create.tenderos')}}" id="botonCrear" class="botonCrear">Crear tendero</a>
            </div>
            <div class="administrar" id="menuAdmin">
                <a href="{{ url('administrar-tenderos')}}" id="botonAdmin" class="botonAdmin">Administrar tenderos</a>
            </div>
        </div>
    </div>

@endsection