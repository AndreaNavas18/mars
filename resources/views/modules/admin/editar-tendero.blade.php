@extends('layouts.appA')

@section('content')
<link rel="stylesheet" href="{{ asset('css/global.css') }}">
<title>Editar tendero</title>
    <div class="divFormu">
        <h1>Editar tendero</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('update.tendero', $tendero->id) }}">
            @csrf
            @method('PUT')
            <div class="formCrear">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ $tendero->nombre }}">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="{{ $tendero->apellido }}">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" id="direccion" value="{{ $tendero->direccion }}">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" value="{{ $tendero->telefono }}">
                <label for="puntos">Puntos</label>
                <input type="text" name="puntos" id="puntos" value="{{ $tendero->puntos }}">

                <button type="submit">Actualizar datos del tendero</button>
            </div>
        </form>
    </div>
@endsection
