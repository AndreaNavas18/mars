@extends('layouts.appT')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/tenderos/dashboard.css') }}">
    <title>Tendero</title>
    <div> 
        <div class="divPTT">
            <h1 class="punTT">${{ number_format(auth()->user()->tendero->cuota_mes, 0, ',', '.') }}</h1>
            <h2 class="tituTTT">META</h2>
        </div>
        <div class="opcTT">
            <h2 class="titu2TTT">Lista de premios</h2>
            <div class="contenedorPre">
                <div class="divPremioTTP">
                    <h3>PERIODO 1</h3>
                    <div class="rowTTP">
                        <img src="{{ asset('images/new/P1.png') }}" class="premio1" alt="Premios">
                        <h4>Kit iniciación</h4>
                    </div>
                </div>
                <div class="divPremioTTP">
                    <h3>PERIODO 2</h3>
                    <div class="rowTTP">
                        <img src="{{ asset('images/new/P2.png') }}" class="premio2" alt="Premios">
                        <h4>Entradas a cine</h4>
                    </div>

                </div>
                <div class="divPremioTTP">
                    <h3>PERIODO 3</h3>
                    <div class="rowTTP">
                        <img src="{{ asset('images/new/P3.png') }}" class="premio3" alt="Premios">
                        <h4>Premio sorpresa</h4>
                    </div>

                </div>
                <div class="divPremioTTP">
                    <h3>PERIODO 4</h3>
                    <div class="rowTTP">
                    <img src="{{ asset('images/new/P4.png') }}" class="premio11" alt="Premios">
                    <h4>Premio sorpresa</h4>
                   </div>

                </div>
                <div class="divPremioTTP">
                    <h3>PERIODO 5</h3>
                    <div class="rowTTP">
                        <img src="{{ asset('images/new/P5.png') }}" class="premio5" alt="Premios">
                        <h4>Premio sorpresa</h4>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
   
@endsection