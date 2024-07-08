@extends('layouts.appT')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/tenderos/dashboard.css') }}">
    <title>Tendero</title>
    <div> 
        <div class="divPTT">
            <h1 class="punTT">${{ number_format(auth()->user()->tendero->cuota_mes, 0, ',', '.') }}</h1>
            <h2 class="tituTTT">META PERIODO 1</h2>
        </div>
        <div class="opcTT">
            <h2 class="titu2TTT">Marcas participantes</h2>
            <div class="contenedorPre">
                <div class="divPremioTTP">
                    <h3>WHISKAS</h3>
                    <div class="rowTTP">
                        {{-- <h4>Merchandising sencillo</h4> --}}
                        <img src="{{ asset('images/new/WHISKAS.png') }}" class="premio11" alt="Premios">
                    </div>
                </div>
                <div class="divPremioTTP">
                    <h3>SNICKERS</h3>
                    <div class="rowTTP">
                        <div>
                            {{-- <h4>Entradas a cine</h4>
                            <p>Incuye crispetas y gaseosa</p> --}}
                        </div>
                        <img src="{{ asset('images/new/SNICKER.jpg') }}" class="premio11" alt="Premios">
                    </div>

                </div>
                <div class="divPremioTTP">
                    <h3>PEDIGREE</h3>
                    <div class="rowTTP">
                        {{-- <h4>Bono sodexo</h4> --}}
                    <img src="{{ asset('images/new/PEDIGREE.jpg') }}" class="premio11" alt="Premios">
                    </div>

                </div>
                <div class="divPremioTTP">
                    <h3>M&M'S</h3>
                    <div class="rowTTP">
                        {{-- <div>
                            <h4>Bono de regalo</h4>
                            <p>de diferentes almacenes de cadena</p>
                        </div> --}}
                    <img src="{{ asset('images/new/MYM.jpg') }}" class="premio11" alt="Premios">
                   </div>

                </div>
                
            </div>
        </div>
    </div>
    
@endsection