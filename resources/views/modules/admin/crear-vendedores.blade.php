@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Creacion de usuario</title>
    <div class="divFormu" style="margin-bottom: 30px">
        <h1>Creacion de usuario</h1>
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
            action="{{ route('store.vendedores') }}"
        >
            @csrf
            <div class="formCrear">
                <label for="tipouusuario">¿Qué usuario desea crear?</label>
                <select name="tipouusuario" id="tipouusuario" required>
                    <option value="">---Seleccione una opción---</option>
                    <option value="vendedor">Vendedor</option>
                    <option value="admin">Administrador</option>
                </select>

                <label for="nombre">Nombre (s)</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="apellido">Apellido (s)</label>
                <input type="text" name="apellido" id="apellido">

                <label for="cedula">Cedula</label>
                <input type="number" name="cedula" id="cedula" required>

                <label for="email">Correo electronico</label>
                <input type="text" name="email" id="email" required>

                <label for="telefono" id="telefono-label">Telefono</label>
                <input type="number" name="telefono" id="telefono" >

                <button style="cursor: pointer" type="submit">Crear usuario</button>
            </div>
        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tipoUsuarioSelect = document.getElementById('tipouusuario');
            var telefonoLabel = document.getElementById('telefono-label');
            var telefonoInput = document.getElementById('telefono');

            tipoUsuarioSelect.addEventListener('change', function () {
                if (tipoUsuarioSelect.value === 'admin') {
                    telefonoLabel.style.display = 'none';
                    telefonoInput.style.display = 'none';
                } else {
                    telefonoLabel.style.display = 'block';
                    telefonoInput.style.display = 'block';
                }
            });

            // Reviso si primero esta seleccionado el admin
            if (tipoUsuarioSelect.value === 'admin') {
                telefonoLabel.style.display = 'none';
                telefonoInput.style.display = 'none';
            }
        });
    </script>
    
@endsection
