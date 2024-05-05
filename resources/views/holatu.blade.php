@extends('hola')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/tenderos/dashboard.css') }}">
        <title>Tendero</title>
    </head>
    <body>
        <div id="loading-container">
            <img src="{{ asset('images/new/cargandopng.gif') }}" class="loading" alt="Cargando">
        </div>
        <div class="contentTT">
            <div class="divPTT">
                <h1 class="punTT">$$$$$$$</h1>
                <h2 class="tituTTT">Puntos acumulados</h2>
            </div>
            <div class="opcTT">
                <h2 class="titu2TTT">Categorias</h2>
                <div class="cardssTT">
                    <div class="TT1">
                        <a href="{{ url('holayo')}}" class="linksTT">
                            <div class="card1TT">
                                <div class="c1TT">
                                    <img src="{{ asset('images/new/premioo1.png') }}" class="iTT" alt="Premios">
                                    <h2 class="tit1TT">Lista de premios</h2>
                                </div>
                            </div>
                        </a>
                        <a href="{{ url('holayo')}}" class="linksTT">
                        <div class="card2TT">
                            <div class="c1TT">
                                <img src="{{ asset('images/new/redimir.png') }}" class="iTT" alt="Ventas">
                                <h2 class="tit1TT">¿Cómo redimirlos?</h2>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="TT2">
                        <a href="{{ url('holayo')}}" class="linksTT">
                        <div class="card3TT">
                            <div class="c1TT">
                                <img src="{{ asset('images/new/recurso.png') }}" class="iTT" alt="Recursos">
                                <h2 class="tit1TT">Recursos</h2>
                            </div>
                        </div>
                        </a>
                        <a href="{{ url('holayo')}}" class="linksTT">
                        <div class="card4TT">
                            <div class="c1TT">
                                <img src="{{ asset('images/new/marcas1.png') }}" class="iTT" alt="marcas">
                                <h2 class="tit1TT">Marcas participantes</h2>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Ocultar la pantalla de carga después de 2 segundos
    setTimeout(function() {
        document.getElementById('loading-container').style.display = 'none';
    }, 2000); // 2000 milisegundos = 2 segundos
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Agregar evento clic al contenedor del menú
    document.getElementById("menuPremios").addEventListener("click", function() {
        // Alternar la clase 'open' para mostrar u ocultar el menú
        this.classList.toggle("open");
    });
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Agregar evento clic al contenedor del menú
        document.getElementById("menuRedim").addEventListener("click", function() {
            // Alternar la clase 'open' para mostrar u ocultar el menú
            this.classList.toggle("open");
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Agregar evento clic al contenedor del menú
        document.getElementById("menuRecur").addEventListener("click", function() {
            // Alternar la clase 'open' para mostrar u ocultar el menú
            this.classList.toggle("open");
        });
    });
</script>