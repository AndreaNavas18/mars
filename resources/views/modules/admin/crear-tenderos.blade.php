@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Creacion de tendero</title>
    <div class="divFormu" style="margin-bottom: 30px">
        <h1 style="color: #0000a0">Creacion de tendero</h1>
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
            action="{{ route('store.tenderos') }}"
        >
            @csrf
            <div class="formCrear">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
                <label for="cedula">Codigo PDV (NIT/CEDULA)</label>
                <input type="number" name="cedula" id="cedula" >
                <label for="telefono">Teléfono *</label>
                <input type="number" name="telefono" id="telefono" required>
                <label for="producto">Producto</label>
                <select name="producto" id="producto">
                    <option value="WET">WET</option>
                    <option value="PET">PET</option>
                    <option value="CHOCO">CHOCO</option>
                </select>
                <label for="canal">Canal</label>
                <select name="canal" id="canal">
                    <option value="SR">SR</option>
                    <option value="SPT">SPT</option>
                </select>
                <label for="subcanal">Sub-Canal</label>
                <select name="subcanal" id="subcanal">
                    <option value="TAT">TAT</option>
                </select>
                <label for="region_nielsen">Región Nielsen</label>
                <select name="region_nielsen" id="region_nielsen">
                    <option value="CUNDI-BOY">CUNDI-BOY</option>
                </select>
                <label for="drop_size">Drop size</label>
                <input type="number" name="drop_size" id="drop_size" >
                <label for="frecuencia">Frecuencia</label>
                <input type="number" name="frecuencia" id="frecuencia" >
                <label for="prob_compra">Probabilidad de compra</label>
                <div style="display: flex;flex-direction:row">
                    <input type="number" name="prob_compra" id="prob_compra" class="form-control" style="width: 85%">
                    <span style="width:15%">%</span>
                </div>
                <label for="cuota_mes">Cuota periodo</label>
                <input type="text" name="cuota_mes" id="cuota_mes" >
                
                <button type="submit">Crear tendero</button>
            </div>
        </form>

    </div>
    
@endsection
