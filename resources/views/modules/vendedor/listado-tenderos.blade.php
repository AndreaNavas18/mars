@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Listado tenderos</title>

    <div class="adminTendTT">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

         <!-- Formulario de búsqueda -->
        <form action="{{ route('search.tenderos') }}" method="GET" class="search-form">
            @csrf
            <input type="text" name="search" placeholder="Buscar por nombre, cédula o región Nielsen">
            <button type="submit">Buscar</button>
        </form>

        <h1>Listado de tenderos</h1>
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
                    <td>{{ $tendero->nombre }}</td>
                    <td style="display: flex;justify-content:center;align-items:center">
                        <a href="{{ route('create.observations', $tendero->id) }}" class="btnTen">Crear Observación</a>
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
