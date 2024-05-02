<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Inicio Administrador</title>
</head>
<body>
    <div class="fondoAdmin">
        <div class="primDivAdmin">
            <img src="{{ asset('images/new/1.png') }}" class="iconoAdmin" alt="Icono">
            <h1 class="title1Admin">Bienvenido(a) {{ auth()->user()->name }}! </h1>
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
                <a id="botonCrear" class="botonCrear">Crear tendero</a>
                <div class="contenidoCrear" id="contenidoCrear">
                    <h1>Formulario para crear el tendero</h1>
                </div>
            </div>
            <div class="administrar" id="menuAdmin">
                <a id="botonAdmin" class="botonAdmin">Administrar tenderos</a>
                <div class="contenidoAdmin" id="contenidoAdmin">
                    @include('modules.administradores.admintend')
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("botonAdmin").addEventListener("click", function() {
            document.getElementById('contenidoAdmin').classList.toggle("open");
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("botonCrear").addEventListener("click", function() {
            document.getElementById('contenidoCrear').classList.toggle("open");
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("botonObs").addEventListener("click", function() {
            document.getElementById('contenidoObs').classList.toggle("open");
        });
    });
</script>