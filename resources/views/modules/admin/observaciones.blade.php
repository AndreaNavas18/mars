@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Observaciones</title>

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
        <h1>Tenderos con observaciones</h1>
        <table class="tablaTendero">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Visualizar</th>
                    @if(auth()->user()->role == 'admin')
                    <th>Creada por</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($tenderos as $tendero)
                <tr>
                    <td>{{ $tendero->nombre }}</td>
                    <td>
                        <a href="{{ route('listado.observations', $tendero->id) }}" class="btnTen">Ver Observaciónes</a>
                    </td>
                    @if(auth()->user()->role == 'admin')
                        @foreach($observations as $observation)
                            <td>{{ $observation->user->name }}</td>
                        @endforeach
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
@endsection
