@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Observaciones</title>

    <div class="divFormu">
        <h1>Creación de observación</h1>
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
                <label for="nombre">Tendero</label>
                <input type="hidden" name="tendero_id" value="{{ $tendero->id }}">
                <h3 style="color: #81267f">{{ ucwords($tendero->nombre) }}</h3>
                <label for="observacion">Observación</label>
                <textarea name="observacion" id="observacion" cols="20" rows="8" required></textarea>
                <label for="file">Adjuntar Archivo</label>
                <input type="file" name="file" id="file">
                <button type="submit">Crear observación</button>
            </div>
        </form>

    </div>

@endsection