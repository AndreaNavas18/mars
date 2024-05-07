@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Creacion de tendero</title>
    <div class="divFormu">
        <h1>Creacion de tendero</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST"
            action="{{ route('store.tenderos') }}"
        >
            @csrf
            <div class="formCrear">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" id="direccion" >
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" required>

                <label for="qr">Escanear QR</label>
                <p class="qrForm">QR</p>
                <button type="submit">Crear tendero</button>
            </div>
        </form>

    </div>
    
@endsection
