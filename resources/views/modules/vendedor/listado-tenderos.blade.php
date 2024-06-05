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
        <h1>Listado de tendero</h1>
        <table class="tablaTendero">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puntos</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tenderos as $tendero)
                <tr>
                    <td>{{ $tendero->nombre }}</td>
                    <td>{{ $tendero->puntos }}</td>
                    <td style="display: flex">
                        <a href="{{ route('create.observations', $tendero->id) }}" class="btnTen">Crear Observación</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
@endsection
