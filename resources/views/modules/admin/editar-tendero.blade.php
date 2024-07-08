@extends('layouts.appA')

@section('content')
<link rel="stylesheet" href="{{ asset('css/global.css') }}">
<title>Editar tendero</title>
    <div class="divFormu">
        <h1>Editar tendero</h1>
        @if (session('success'))
                <div class="alert alert-success" style="background-color:#00800038;color:green;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                {{ session('success') }}
            </div>
            @elseif (session('error'))
                <div class="alert alert-danger" style="background-color:#ff000024;color:red;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('update.tendero', $tendero->id) }}">
            @csrf
            @method('PUT')
            <div class="formCrear">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ $tendero->nombre }}">
                <label for="puntos">Puntos</label>
                <input type="text" name="puntos" id="puntos" value="{{ $tendero->puntos }}">
                <label for="cedula">Código PDV (NIT)</label>
                <input type="number" name="cedula" id="cedula" value="{{ $tendero->cedula }}" >
                <label for="producto">Producto</label>
                <select name="producto" id="producto">
                    <option value="wet" {{ $tendero->producto == 'wet' ? 'selected' : '' }}>WET</option>
                    <option value="choco" {{ $tendero->producto == 'choco' ? 'selected' : '' }}>CHOCO</option>
                </select>
                <label for="canal">Canal</label>
                <select name="canal" id="canal">
                    <option value="sr" {{ $tendero->canal == 'sr' ? 'selected' : '' }}>SR</option>
                </select>
                <label for="subcanal">Sub-Canal</label>
                <select name="subcanal" id="subcanal">
                    <option value="tat" {{ $tendero->subcanal == 'tat' ? 'selected' : '' }}>TAT</option>
                </select>
                <label for="region_nielsen">Región Nielsen</label>
                <select name="region_nielsen" id="region_nielsen">
                    <option value="cundiboy" {{ $tendero->region_nielsen == 'cundiboy' ? 'selected' : '' }}>CUNDI-BOY</option>
                </select>
                <label for="drop_size">Drop size</label>
                <input type="number" name="drop_size" id="drop_size" value="{{ $tendero->drop_size }}" >
                <label for="frecuencia">Frecuencia</label>
                <input type="number" name="frecuencia" id="frecuencia" value="{{ $tendero->frecuencia }}" >
                <label for="prob_compra">Probabilidad de compra</label>
                <input type="number" name="prob_compra" id="prob_compra" value="{{ $tendero->prob_compra }}" >
                <label for="cuota_mes">Cuota mes</label>
                <input type="text" name="cuota_mes" id="cuota_mes" value="{{ $tendero->cuota_mes }}" >


                <button type="submit">Actualizar datos del tendero</button>
            </div>
        </form>
    </div>
@endsection
