@extends('layouts.appT')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/tenderos/dashboard.css') }}">
    <title>Tendero</title>
    <div> 
        <div class="divPTT">
            <h1 class="punTT">${{ number_format(auth()->user()->tendero->cuota_mes, 0, ',', '.') }}</h1>
            <h2 class="tituTTT">META PERIODO 1</h2>
        </div>
        <div class="opcTT" style="margin-bottom: 20px">
            <h2 class="titu2TTT">Lista de premios</h2>
            <div class="pp1">
                <div class="term1">
                    <div class="fill"></div>
                    <h1 style="margin-top: 30px">1</h1>
                    <h2>Periodo</h2>
                </div>
                <div class="prePri">
                    <h3>Periodo 1</h3>
                    <div class="rowTTP">
                        <img src="{{ asset('images/new/prueba.jpg') }}" class="premio1" alt="Premios">
                        {{-- <h4>Kit de iniciación</h4> --}}
                    </div>
                </div>
            </div>
            <div class="pp1">
                <div class="term2">
                    <div class="fill"></div>
                    <h1 style="margin-top: 30px">2</h1>
                    <h2>Periodo</h2>
                </div>
                <div class="prePri">
                    <h3>Periodo 2</h3>
                    <div class="rowTTP">
                        <img src="{{ asset('images/new/prueba2.jpg') }}" class="premio1" alt="Premios">
                        {{-- <h4>Entradas a cine</h4> --}}
                    </div>
                </div>
            </div>
            <div class="pp1">
                <div class="term3">
                    <div class="fill"></div>
                    <h1 style="margin-top: 30px">3</h1>
                    <h2>Periodo</h2>
                </div>
                <div class="prePri">
                    <h3>Periodo 3</h3>
                    <div class="rowTTP">
                        <img src="{{ asset('images/new/prueba3.jpg') }}" class="premio1" alt="Premios">
                        {{-- <h4>Premio sorpresa</h4> --}}
                    </div>
                </div>
            </div>
            <div class="pp1">
                <div class="term4">
                    <div class="fill"></div>
                    <h1 style="margin-top: 30px">4</h1>
                    <h2>Periodo</h2>
                </div>
                <div class="prePri">
                    <h3>Periodo 4</h3>
                    <div class="rowTTP">
                        <img src="{{ asset('images/new/prueba4.jpg') }}" class="premio1" alt="Premios">
                        {{-- <h4>Premio sorpresa</h4> --}}
                    </div>
                </div>
            </div>
            <div class="pp1">
                <div class="term5">
                    <div class="fill"></div>
                    <h1 style="margin-top: 85px">5</h1>
                    <h2>Periodo</h2>
                </div>
                <div class="prePri2">
                    <h3>Periodo 5</h3>
                    <div class="rowTTP">
                        <img src="{{ asset('images/new/prueba5.jpg') }}" class="premio1" alt="Premios">
                        {{-- <h4>Premio sorpresa</h4> --}}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
   
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var terms = document.querySelectorAll('.term1, .term2, .term3, .term4, .term5'); // Selecciona todos los términos
        var fillAnimationDuration = 3000; // Duración de la animación en milisegundos

        function animateTerms() {
            terms.forEach(function(term, index) {
                var fill = term.querySelector('.fill'); // Selecciona el div de llenado dentro de cada term
                fill.style.height = '0'; // Asegura que la altura inicial sea cero antes de comenzar la animación
                var delay = index * fillAnimationDuration; // Retraso para cada término basado en su índice
                
                setTimeout(function() {
                    fill.style.animation = 'fillAnimation ' + fillAnimationDuration / 1000 + 's forwards';
                }, delay);
            });

            // Reiniciar la animación después de que termine el ciclo completo
            setTimeout(function() {
                terms.forEach(function(term) {
                    var fill = term.querySelector('.fill');
                    fill.style.animation = ''; // Restablece la animación para el próximo ciclo
                });
                animateTerms(); // Llama a la función para iniciar el siguiente ciclo
            }, terms.length * fillAnimationDuration);
        }

        // Llama a la función para iniciar la animación por primera vez
        animateTerms();
    });
</script>


