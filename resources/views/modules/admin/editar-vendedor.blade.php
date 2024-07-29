@extends('layouts.appA')

@section('content')
<link rel="stylesheet" href="{{ asset('css/global.css') }}">
<title>Editar vendedor</title>
    <div class="divFormu">
        <h1>Editar vendedor</h1>
        @if (session('success'))
                <div class="alert alert-success" style="background-color:#00800038;color:green;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                {{ session('success') }}
            </div>
            @elseif (session('error'))
                <div class="alert alert-danger" style="background-color:#ff000024;color:red;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('update.vendedor', $vendedor->id) }}">
            @csrf
            @method('PUT')
            <div class="formCrear">
                <label for="nombre">Nombre completo</label>
                <input type="text" name="nombre" id="nombre" value="{{ $vendedor->nombre }}">
                <label for="cedula">Cédula</label>
                <input type="number" name="cedula" id="cedula" value="{{ $vendedor->cedula }}" >
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $vendedor->email }}" >
                <label for="telefono">Teléfono</label>
                <input type="number" name="telefono" id="telefono" value="{{ $vendedor->telefono }}" >
                <label for="perfil">Perfil</label>
                <select name="perfil" id="perfil">
                    <option value="supervisor" {{ $vendedor->perfil == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                    <option value="vendedor_base" {{ $vendedor->perfil == 'vendedor_base' ? 'selected' : '' }}>Vendedor base</option>
                    <option value="vendedor_focalizado" {{ $vendedor->perfil == 'vendedor_focalizado' ? 'selected' : '' }}>Vendedor focalizado</option>
                </select>
                <label for="canal">Canal</label>
                <select name="canal" id="canal">
                    <option value="multicanal" {{ $vendedor->canal == 'multicanal' ? 'selected' : '' }}>Multicanal</option>
                    <option value="tat" {{ $vendedor->canal == 'tat' ? 'selected' : '' }}>TAT</option>
                </select>


                <button type="submit">Actualizar datos del vendedor</button>
            </div>
        </form>
    </div>
@endsection
