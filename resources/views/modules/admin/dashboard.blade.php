@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Inicio Administrador</title>

    <div class="fondoAdmin">
        <div class="header2Admin">
            <h1 class="titleAdmin">Bienvenido Administrador</h1>
        </div>

        <div class="segDivAdmin">
            <h2 class="title2Admin">Qué desea hacer hoy?</h2>
            <div class="obss" id="menuObs">
                <a id="botonObs" class="botonObs">Ver observaciones</a>
                <div class="contenidoObs" id="contenidoObs">
                    <h1>Observaciones creadas por el vendedor</h1>
                </div>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("botonObs").addEventListener("click", function() {
            document.getElementById('contenidoObs').classList.toggle("open");
        });
    });
</script>