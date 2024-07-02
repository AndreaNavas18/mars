@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Creacion de vendedor</title>
    <div class="divFormu" style="margin-bottom: 30px">
        <h1>Creacion de vendedor</h1>
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
            action="{{ route('store.vendedores') }}"
        >
            @csrf
            <div class="formCrear">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="cedula">Cedula</label>
                <input type="number" name="cedula" id="cedula" >

                <label for="drop_size">Correo electronico</label>
                <input type="text" name="email" id="email" >

                <button type="submit">Crear vendedor</button>
            </div>
        </form>

    </div>
    
@endsection
