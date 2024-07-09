@extends('layouts.appT')

@section('content')
        <link rel="stylesheet" href="{{ asset('css/tenderos/dashboard.css') }}">
        <script src="{{ asset('js/load.js') }}" defer></script>
        <div id="loading-container">
            <img src="{{ asset('images/new/cargandopng.gif') }}" class="loading" alt="Cargando">
        </div>
        <div class="contentTT">
            <div class="divPTT">
                <h1 class="punTT">${{ number_format(auth()->user()->tendero->cuota_mes, 0, ',', '.') }}</h1>
                <h2 class="tituTTT">META PERIODO 1</h2>
            </div>
            <div class="opcTT">
                <h2 class="titu2TTT">Categorias</h2>
                <div class="cardssTT">
                    <div class="TT1">
                        <a href="{{ url('premios')}}" class="linksTT">
                            <div class="card1TT">
                                <div class="c1TT">
                                    <img src="{{ asset('images/new/premioo1.png') }}" class="iTT" alt="Premios">
                                    <h2 class="tit1TT">Lista de premios</h2>
                                </div>
                            </div>
                        </a>
                        <a href="{{ url('redimir')}}" class="linksTT">
                        <div class="card2TT">
                            <div class="c1TT">
                                <img src="{{ asset('images/new/redimir.png') }}" class="iTT" alt="Redimir">
                                <h2 class="tit1TT">Recursos informativos</h2>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="TT2" style="display: none">
                        <a href="{{ url('recursos')}}" class="linksTT">
                        <div class="card3TT">
                            <div class="c1TT">
                                <img src="{{ asset('images/new/recurso.png') }}" class="iTT" alt="Recursos">
                                <h2 class="tit1TT">Recursos</h2>
                            </div>
                        </div>
                        </a>
                        <a href="{{ url('marcas')}}" class="linksTT">
                        <div class="card4TT">
                            <div class="c1TT">
                                <img src="{{ asset('images/new/marcas1.png') }}" class="iTT" alt="Marcas">
                                <h2 class="tit1TT">Marcas participantes</h2>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection