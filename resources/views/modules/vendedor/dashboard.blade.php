@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ secure_asset('css/global.css') }}">
    <title>Inicio Vendedor</title>

    <div class="fondoAdmin">
        <div class="header2Admin">
            <h1 class="titleAdmin">Bienvenido Vendedor</h1>
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
                <a href="{{ route('listado.tenderos')}}" id="botonObs" class="botonObs">Crear observacion</a>
            </div>
            <div class="creacionn" id="menuCrear">
                <a href="{{ route('historial.observations')}}" id="botonCrear" class="botonCrear">Historial observaciones</a>
            </div>
            <div class="administrar" id="menuAdmin">
                <a href="{{ route('activar.vista.tendero') }}" id="botonAdmin" class="botonAdmin">Activar tendero</a>
            </div>
        </div>
    </div>

@endsection