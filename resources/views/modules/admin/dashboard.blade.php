@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Inicio Administrador</title>

    <div class="fondoAdmin">
        <div class="header2Admin">
            <h1 class="titleAdmin">Bienvenido Administrador</h1>
        </div>
        
        <div class="segDivAdmin">
            @if (session('success'))
                <div class="alert alert-success" style="background-color:#00800038;color:green;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                    {{ session('success') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger" style="background-color:#ff000024;color:red;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                    {{ session('error') }}
                </div>
            @endif
            <h2 class="title2Admin">¿Qué desea hacer hoy?</h2>
            <div class="obss btnInicial" id="menuObs">
                <a href="{{ route('obs.tenderos')}}" id="botonObs" class="botonObs"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:20px">Ver observación</h2></a>
            </div>
            <div class="creacionn btnInicial" id="menuCrear">
                <a href="{{ route('create.tenderos')}}" id="botonCrear" class="botonCrear"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:20px">Crear tendero</h2></a>
            </div>
            <div class="creacionnV btnInicial" id="menuCrearV">
                <a href="{{ route('create.vendedores')}}" id="botonCrearV" class="botonCrearV"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:20px">Crear usuario</h2></a>
            </div>
            <div class="administrar btnInicial" id="menuAdmin">
                <a href="{{ url('administrar-tenderos')}}" id="botonAdmin" class="botonAdmin"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:20px">Administrar tenderos</h2></a>
            </div>
            <div class="administrarV btnInicial" id="menuAdminV">
                <a href="{{ url('administrar-vendedores')}}" id="botonAdminV" class="botonAdminV"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:20px">Administrar vendedores</h2></a>
            </div>
            <div style="margin-left:70px;display:none">
                <div class="import btnInicial" id="menuImport">
                    <form method="POST" id="frmImport" class="botonImport" action="{{ route('import.tenderos') }}" enctype="multipart/form-data">
                        @csrf
                        <p class="titImport">Importar tendero(s)</p>
                        <div class="row">
                            <div class="col-md-3 col-sm-12  mb-4">
                                <input type="file" name="tenderodocumento" class="uppp">
                            </div>
                            <div class="col-md-3 col-sm-12 mb-4 mt-2">
                                <button class="btnImm"
                                    type="submit"
                                    name="action"
                                    value="importar">
                                    <i class="fas fa-arrow-up-from-bracket"></i> Importar
                                </button>
                            </div>
                        
                        </div>
                    </form>
                </div>
                <div class="import btnInicial" id="menuImport">
                    <form method="POST" id="frmImport" class="botonImport" action="{{ route('import.tokens') }}" enctype="multipart/form-data">
                        @csrf
                        <p class="titImport">Importar token(s)</p>
                        <div class="row">
                            <div class="col-md-3 col-sm-12  mb-4">
                                <input type="file" name="tokendocumento" class="uppp">
                            </div>
                            <div class="col-md-3 col-sm-12 mb-4 mt-2">
                                <button class="btnImm"
                                    type="submit"
                                    name="action"
                                    value="importar">
                                    <i class="fas fa-arrow-up-from-bracket"></i> Importar
                                </button>
                            </div>
                        
                        </div>
                    </form>
                </div>
                <div class="import btnInicial" id="menuImport">
                    <form method="POST" id="frmImport" class="botonImport" action="{{ route('import.empleados') }}" enctype="multipart/form-data">
                        @csrf
                        <p class="titImport">Importar empleado(s)</p>
                        <div class="row">
                            <div class="col-md-3 col-sm-12  mb-4">
                                <input type="file" name="empleadodocumento" class="uppp">
                            </div>
                            <div class="col-md-3 col-sm-12 mb-4 mt-2">
                                <button class="btnImm"
                                    type="submit"
                                    name="action"
                                    value="importar">
                                    <i class="fas fa-arrow-up-from-bracket"></i> Importar
                                </button>
                            </div>
                        
                        </div>
                    </form>
                </div>
                <div class="import btnInicial" id="menuImport">
                    <form method="POST" id="frmImport" class="botonImport" action="{{ route('import.cumplimientos') }}" enctype="multipart/form-data">
                        @csrf
                        <p class="titImport">Importar cumplimiento(s)</p>
                        <div class="row">
                            <div class="col-md-3 col-sm-12  mb-4">
                                <input type="file" name="cumplimientodocumento" class="uppp">
                            </div>
                            <div class="col-md-3 col-sm-12 mb-4 mt-2">
                                <button class="btnImm"
                                    type="submit"
                                    name="action"
                                    value="importar">
                                    <i class="fas fa-arrow-up-from-bracket"></i> Importar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="import btnInicial" id="menuImport">
                    <form method="POST" id="frmImport" class="botonImport" action="{{ route('import.empleados.update') }}" enctype="multipart/form-data">
                        @csrf
                        <p class="titImport">Actualizar empleado(s)</p>
                        <div class="row">
                            <div class="col-md-3 col-sm-12  mb-4">
                                <input type="file" name="empleadoupdatedocumento" class="uppp">
                            </div>
                            <div class="col-md-3 col-sm-12 mb-4 mt-2">
                                <button class="btnImm"
                                    type="submit"
                                    name="action"
                                    value="importar">
                                    <i class="fas fa-arrow-up-from-bracket"></i> Importar
                                </button>
                            </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection