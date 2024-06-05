@extends('layouts.appT')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/tenderos/dashboard.css') }}">
    <title>Tendero</title>
    <div> 
        <div class="divPTT">
            <h1 class="punTT">{{ auth()->user()->tendero->puntos }}</h1>
            <h2 class="tituTTT">Puntos acumulados</h2>
        </div>
        <div class="opcTT">
            <h2 class="titu2TTT">Marcas participantes</h2>
            <div class="contenedorPre">
                <div class="divPremioTTP">
                    <h3>WHISKAS</h3>
                    <div class="rowTTP">
                        {{-- <h4>Merchandising sencillo</h4> --}}
                        <img src="{{ asset('images/new/whiskas.png') }}" class="premio11" alt="Premios">
                    </div>
                </div>
                <div class="divPremioTTP">
                    <h3>SNICKERS</h3>
                    <div class="rowTTP">
                        <div>
                            {{-- <h4>Entradas a cine</h4>
                            <p>Incuye crispetas y gaseosa</p> --}}
                        </div>
                        <img src="{{ asset('images/new/snicker.jpg') }}" class="premio11" alt="Premios">
                    </div>

                </div>
                <div class="divPremioTTP">
                    <h3>PEDIGREE</h3>
                    <div class="rowTTP">
                        {{-- <h4>Bono sodexo</h4> --}}
                    <img src="{{ asset('images/new/pedigree.jpg') }}" class="premio11" alt="Premios">
                    </div>

                </div>
                <div class="divPremioTTP">
                    <h3>M&M'S</h3>
                    <div class="rowTTP">
                        {{-- <div>
                            <h4>Bono de regalo</h4>
                            <p>de diferentes almacenes de cadena</p>
                        </div> --}}
                    <img src="{{ asset('images/new/mym.jpg') }}" class="premio11" alt="Premios">
                   </div>

                </div>
                
            </div>
        </div>
    </div>
    
@endsection