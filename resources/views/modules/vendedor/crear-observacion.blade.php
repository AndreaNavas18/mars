@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ secure_asset('css/global.css') }}">
    <title>Observaciones</title>

    <div class="divFormu">
        <h1>Creación de observación</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST"
            action="{{ route('store.observations', $tendero->id) }}"
        >
            @csrf
            <div class="formCrear">
                <label for="nombre">Tendero</label>
                <input type="hidden" name="tendero_id" value="{{ $tendero->id }}">
                <h3 style="color: #81267f">{{ ucwords($tendero->nombre) }}</h3>
                <label for="observacion">Observación</label>
                <textarea name="observacion" id="observacion" cols="20" rows="8"></textarea>
                <button type="submit">Crear observación</button>
            </div>
        </form>

    </div>

@endsection