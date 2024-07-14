@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Administrar vendedores</title>

    <div class="adminTendTT">
        @if (session('success'))
            <div class="alert alert-success" style="background-color:#00800038;color:green;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
        <div class="alert alert-danger" style="background-color:#ff000024;color:red;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
            {{ session('error') }}
        </div>
        @endif

         <!-- Formulario de búsqueda -->
         <form action="{{ route('search.admin.vendedores') }}" method="GET" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Busca nombre o cédula">
            <button type="submit"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">Buscar</h2></button>
        </form>

        <h1 style="color: #0000a0;text-align:center">Administracion de vendedores</h1>
        <table class="tablaTendero">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendedores as $vendedor)
                <tr>
                    <td><h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">{{ $vendedor->nombre }} {{ $vendedor->apellido }}</h2></td>
                    <td>
                        <div class="action-buttons" style="display: flex; flex-direction: column; align-items: center;">
                            <a href="{{ route('edit.vendedor', $vendedor->id) }}" class="btnTen" style="display: flex; justify-content: center; align-items: center; margin-bottom: 5px;">
                                <h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">Editar</h2>
                            </a>
                            <form action="{{ route('destroy.vendedor', $vendedor->id) }}" method="POST" style="display: flex; justify-content: center; align-items: center;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btnTen2" style="display: flex; justify-content: center; align-items: center; margin-bottom: 5px;" onclick="return confirm('¿Estás seguro de que deseas eliminar este vendedor?');">
                                    <h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">Eliminar</h2>
                                </button>
                            </form>
                        </div>
                    </td>
                    {{-- <td>
                        <a href="{{ route('edit.vendedor', $vendedor->id) }}" class="btnTen" style="display: flex;justify-content:center;align-items:center">
                            <h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">Editar</h2>
                        </a>
                        <form action="{{ route('destroy.vendedor', $vendedor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btnTen2" style="display: flex;justify-content:center;align-items:center" onclick="return confirm('¿Estás seguro de que deseas eliminar este vendedor?');">
                                <h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">Eliminar</h2>
                            </button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Paginación personalizada -->
        <div class="custom-pagination">
            @if ($vendedores->lastPage() > 1)
                <ul>
                    @if ($vendedores->currentPage() > 1)
                        <li><a href="{{ $vendedores->url(1) }}" aria-label="First">&laquo;&laquo;</a></li>
                        <li><a href="{{ $vendedores->previousPageUrl() }}" aria-label="Previous">&laquo;</a></li>
                    @endif
        
                    @for ($i = max(1, $vendedores->currentPage() - 2); $i <= min($vendedores->lastPage(), $vendedores->currentPage() + 2); $i++)
                        <li class="{{ ($vendedores->currentPage() == $i) ? 'active' : '' }}">
                            <a href="{{ $vendedores->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
        
                    @if ($vendedores->currentPage() < $vendedores->lastPage())
                        <li><a href="{{ $vendedores->nextPageUrl() }}" aria-label="Next">&raquo;</a></li>
                        <li><a href="{{ $vendedores->url($vendedores->lastPage()) }}" aria-label="Last">&raquo;&raquo;</a></li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
@endsection
{{-- 
<input type="hidden" name="tendero_id" id="tendero_id" value="">
<div id="tendero_contenido" style="display: none"></div> --}}
