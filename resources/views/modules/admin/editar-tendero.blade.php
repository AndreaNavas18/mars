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
        @endif
        <form method="POST" action="{{ route('update.tendero', $tendero->id) }}">
            @csrf
            @method('PUT')
            <div class="formCrear">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ $tendero->nombre }}" required>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="{{ $tendero->apellido }}">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" id="direccion" value="{{ $tendero->direccion }}">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" value="{{ $tendero->telefono }}" required>

                <button type="submit">Actualizar datos del tendero</button>
            </div>
        </form>
    </div>
@endsection
