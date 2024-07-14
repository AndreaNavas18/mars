@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Observaciones</title>

    <div class="divFormu">
        <h1 style="font-family:'HelveticaBold', sans-serif;font-size:24px;color:#0000a0">Creación de observación</h1>
        @if (session('success'))
                <div class="alert alert-success" style="background-color:#00800038;color:green;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                {{ session('success') }}
            </div>
            @elseif (session('error'))
                <div class="alert alert-danger" style="background-color:#ff000024;color:red;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST"
            action="{{ route('store.observations', $tendero->id) }}"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="formCrear">
                <label for="nombre">Nombre del tendero</label>
                <input type="hidden" name="tendero_id" value="{{ $tendero->id }}">
                <h3 style="color: #0000a0">{{ ucwords($tendero->nombre) }}</h3>
                <label for="observacion">Observación</label>
                <textarea name="observacion" id="observacion" cols="20" rows="8" required></textarea>
                <label for="file">Adjuntar Archivo</label>
                <input type="file" name="file" id="file">
                <div style="display: flex;flex-direction:row;gap:10px">
                    <label for="tipo">¿La observación es por motivo de pérdida, robo o daño?</label>
                    <checkbox style="margin-top:10px">
                        <input type="checkbox" name="causa" value="1">
                    </checkbox>
                </div>

                <button type="submit" style="box-shadow: 0px 0px 5px 0px #0000a0;"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px;">Crear observación</h2></button>
            </div>
        </form>

    </div>

@endsection