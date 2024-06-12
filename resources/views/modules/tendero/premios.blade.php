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
                    <h3>PRIMER MES</h3>
                    <div class="rowTTP">
                        {{-- <h4>Merchandising sencillo</h4> --}}
                        <img src="{{ asset('images/new/cap.png') }}" class="premio1" alt="Premios">
                    </div>
                </div>
                <div class="divPremioTTP">
                    <h3>SEGUNDO MES</h3>
                    <div class="rowTTP">
                        <div>
                            {{-- <h4>Entradas a cine</h4>
                            <p>Incuye crispetas y gaseosa</p> --}}
                        </div>
                        <img src="{{ asset('images/new/cine.png') }}" class="premio1" alt="Premios">
                    </div>

                </div>
                <div class="divPremioTTP">
                    <h3>TERCER MES</h3>
                    <div class="rowTTP">
                        {{-- <h4>Bono sodexo</h4> --}}
                    <img src="{{ asset('images/new/sodexo.png') }}" class="premio1" alt="Premios">
                    </div>

                </div>
                <div class="divPremioTTP">
                    <h3>CUARTO MES</h3>
                    <div class="rowTTP">
                        {{-- <div>
                            <h4>Bono de regalo</h4>
                            <p>de diferentes almacenes de cadena</p>
                        </div> --}}
                    <img src="{{ asset('images/new/bono-01.png') }}" class="premio11" alt="Premios">
                   </div>

                </div>
                <div class="divPremioTTP">
                    <h3>QUINTO MES</h3>
                    <div class="rowTTP">
                        {{-- <div>
                            <h4>Bono tecnología</h4>
                            <p>de diferentes almacenes de cadena</p>
                        </div> --}}
                        <img src="{{ asset('images/new/bono-02.png') }}" class="premio11" alt="Premios">
                    </div>

                </div>
                <div class="divPremioTTP">
                    <h3>SEXTO MES</h3>
                    <div class="rowTTP">
                        {{-- <div>
                            <h4>Bono electrohogar</h4>
                            <p>de diferentes almacenes de cadena</p>
                        </div> --}}
                        <img src="{{ asset('images/new/bono-03.png') }}" class="premio11" alt="Premios">
                    </div>

                </div>
                
            </div>
        </div>
    </div>
   
@endsection