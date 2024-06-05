@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ secure_asset('css/global.css') }}">
    <title>Creacion de tendero</title>
    <div class="divFormu">
        <h1>Creacion de tendero</h1>
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
            action="{{ route('store.tenderos') }}"
        >
            @csrf
            <div class="formCrear">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
                <label for="cedula">Cedula PDV</label>
                <input type="number" name="cedula" id="cedula" >
                <label for="codigo_pdv">Código PDV</label>
                <input type="text" name="codigo_pdv" id="codigo_pdv" >
                <label for="producto">Producto</label>
                <select name="producto" id="producto">
                    <option value="wet">WET</option>
                    <option value="choco">CHOCO</option>
                </select>
                <label for="canal">Canal</label>
                <select name="canal" id="canal">
                    <option value="sr">SR</option>
                </select>
                <label for="subcanal">Sub-Canal</label>
                <select name="subcanal" id="subcanal">
                    <option value="tat">TAT</option>
                </select>
                <label for="region_nielsen">Región Nielsen</label>
                <select name="region_nielsen" id="region_nielsen">
                    <option value="cundiboy">CUNDI-BOY</option>
                </select>
                <label for="drop_size">Drop size</label>
                <input type="number" name="drop_size" id="drop_size" >
                <label for="frecuencia">Frecuencia</label>
                <input type="number" name="frecuencia" id="frecuencia" >
                <label for="prob_compra">Probabilidad de compra</label>
                <input type="number" name="prob_compra" id="prob_compra" >
                <label for="cuota_mes">Cuota mes</label>
                <input type="text" name="cuota_mes" id="cuota_mes" >
                
                <button type="submit">Crear tendero</button>
            </div>
        </form>

    </div>
    
@endsection
