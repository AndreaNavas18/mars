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
                <label for="cedula">Código PDV (NIT/CEDULA)</label>
                <input type="number" name="cedula" id="cedula" value="{{ $tendero->cedula }}" >
                <label for="telefono">Teléfono *</label>
                <input type="number" name="telefono" id="telefono" value="{{ $tendero->telefono }}">
                <label for="producto">Producto</label>
                <select name="producto" id="producto">
                    <option value="WET" {{ $tendero->producto == 'WET' ? 'selected' : '' }}>WET</option>
                    <option value="PET" {{ $tendero->producto == 'PET' ? 'selected' : '' }}>PET</option>
                    <option value="CHOCO" {{ $tendero->producto == 'CHOCO' ? 'selected' : '' }}>CHOCO</option>
                </select>
                <label for="canal">Canal</label>
                <select name="canal" id="canal">
                    <option value="SR" {{ $tendero->canal == 'SR' ? 'selected' : '' }}>SR</option>
                    <option value="SPT" {{ $tendero->canal == 'SPT' ? 'selected' : '' }}>SPT</option>
                </select>
                <label for="subcanal">Sub-Canal</label>
                <select name="subcanal" id="subcanal">
                    <option value="TAT" {{ $tendero->subcanal == 'TAT' ? 'selected' : '' }}>TAT</option>
                </select>
                <label for="region_nielsen">Región Nielsen</label>
                <select name="region_nielsen" id="region_nielsen">
                    <option value="CUNDI-BOY" {{ $tendero->region_nielsen == 'CUNDI-BOY' ? 'selected' : '' }}>CUNDI-BOY</option>
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
