<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/vendedores/dashboard.css') }}">
    <title>Dashboard vendedor</title>
</head>
<body>
    <div id="loading-container">
        <img src="{{ asset('images/new/cargando.gif') }}" class="loading" alt="Cargando">
    </div>
    <div>
        <div class="fondoDashboard">
            <div class="primerDiv">
                <div class="divv1">
                    <div class="Encabezado">
                        <h2 class="bienvenida">¡Hola, {{ auth()->user()->name }}! </h2>
                        <p class="fraseI">¡Contamos contigo para avanzar!</p>
                    </div>
                        <img src="{{ asset('images/new/vendedor2.png') }}" class="usericon" alt="avatar">
                </div>
                <div class="divvv2">
                    <h1 class="fraseII">¿Observaciones pendientes?</h1>
                    <div class="divOb">
                        <select name="tendero_id" class="selectI">
                            <option value="1">Observación 1</option>
                            <option value="2">Observación 2</option>
                            <option value="3">Observación 3</option>
                        </select>
                        <textarea name="observacion" class="textareaI"></textarea>
                    </div>
            </div>
            </div>
            <div class="segunDiv">
                <h1 class="titulo2">Categorias</h1>
                <div class="divCards">
                    <div class="card1" id="menuPremios">
                        <div class="card2">
                            <img src="{{ asset('images/new/premio.png') }}" class="iconoCard" alt="Premios">
                            <h2 class="tit1">Lista de premios</h2>
                        </div>
                        <div class="contenidoPremios" id="contenidoPremios">
                            <div class="ulCard">
                                <div class="p1">
                                    <img src="{{ asset('images/new/premio.png') }}" class="i" alt="Premios">
                                    <h3 class="sub">Premio 1</h3>
                                </div>
                                <div class="p1">
                                    <img src="{{ asset('images/new/premio.png') }}" class="i" alt="Premios">
                                    <h3 class="sub">Premio 1</h3>
                                </div>
                                <div class="p1">
                                    <img src="{{ asset('images/new/premio.png') }}" class="i" alt="Premios">
                                    <h3 class="sub">Premio 1</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card10" id="menuRedim">
                        <div class="card2">
                            <img src="{{ asset('images/new/redimir.png') }}" class="iconoCard" alt="Ventas">
                        <h2 class="tit1">¿Cómo redimirlos?</h2>
                        </div>
                        <div class="contenidoRedim" id="contenidoRedim">
                            <div class="ulCard">
                                <div class="p1">
                                    <img src="{{ asset('images/new/premio.png') }}" class="i" alt="Premios">
                                    <h3 class="sub">Premio 1</h3>
                                </div>
                                <div class="p1">
                                    <img src="{{ asset('images/new/premio.png') }}" class="i" alt="Premios">
                                    <h3 class="sub">Premio 1</h3>
                                </div>
                                <div class="p1">
                                    <img src="{{ asset('images/new/premio.png') }}" class="i" alt="Premios">
                                    <h3 class="sub">Premio 1</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card11" id="menuRecur">
                        <div class="card2">
                            <img src="{{ asset('images/new/recurso.png') }}" class="iconoCard" alt="Ventas">
                            <h2 class="tit1">Guías y recursos</h2>
                        </div>
                        <div class="contenidoRecur" id="contenidoRecur">
                            <div class="ulCard">
                                <div class="p1">
                                    <img src="{{ asset('images/new/premio.png') }}" class="i" alt="Premios">
                                    <h3 class="sub">Premio 1</h3>
                                </div>
                                <div class="p1">
                                    <img src="{{ asset('images/new/premio.png') }}" class="i" alt="Premios">
                                    <h3 class="sub">Premio 1</h3>
                                </div>
                                <div class="p1">
                                    <img src="{{ asset('images/new/premio.png') }}" class="i" alt="Premios">
                                    <h3 class="sub">Premio 1</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</body>
</html>

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