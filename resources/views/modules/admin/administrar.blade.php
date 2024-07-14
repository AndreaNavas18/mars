@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Administrar tenderos</title>

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
         <form action="{{ route('search.admin.tenderos') }}" method="GET" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Busca nombre-cédula-región Nielsen">
            <button type="submit"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">Buscar</h2></button>
        </form>

        <h1 style="color: #0000a0; text-align:center">Administracion de tenderos</h1>
        <table class="tablaTendero">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tenderos as $tendero)
                <tr>
                    <td><h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">{{ $tendero->nombre }}</h2></td>
                    <td>
                        <a href="{{ route('edit.tendero', $tendero->id) }}" class="btnTen" style="display: flex;justify-content:center;align-items:center"> 
                            <h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">Editar</h2>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Paginación personalizada -->
        <div class="custom-pagination">
            @if ($tenderos->lastPage() > 1)
                <ul>
                    @if ($tenderos->currentPage() > 1)
                        <li><a href="{{ $tenderos->url(1) }}" aria-label="First">&laquo;&laquo;</a></li>
                        <li><a href="{{ $tenderos->previousPageUrl() }}" aria-label="Previous">&laquo;</a></li>
                    @endif
        
                    @for ($i = max(1, $tenderos->currentPage() - 2); $i <= min($tenderos->lastPage(), $tenderos->currentPage() + 2); $i++)
                        <li class="{{ ($tenderos->currentPage() == $i) ? 'active' : '' }}">
                            <a href="{{ $tenderos->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
        
                    @if ($tenderos->currentPage() < $tenderos->lastPage())
                        <li><a href="{{ $tenderos->nextPageUrl() }}" aria-label="Next">&raquo;</a></li>
                        <li><a href="{{ $tenderos->url($tenderos->lastPage()) }}" aria-label="Last">&raquo;&raquo;</a></li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
@endsection
{{-- 
<input type="hidden" name="tendero_id" id="tendero_id" value="">
<div id="tendero_contenido" style="display: none"></div> --}}
