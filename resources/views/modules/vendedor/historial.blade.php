@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ secure_asset('css/global.css') }}">
    <title>Observaciones</title>

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
        <h1>Tenderos con observaciones</h1>
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
                    <td>
                        <a href="{{ route('listado.observations', $tendero->id) }}" class="btnTen">Ver Observaciónes</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
@endsection
