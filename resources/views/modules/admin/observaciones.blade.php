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
        <h1 style="color: #0000a0;text-align:center">Tenderos con observaciones</h1>
        <table class="tablaTendero">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Visualizar</th>
                    @if(auth()->user()->hasRole('admin'))
                    <th>Creada por</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($tenderos as $tendero)
                <tr>
                    <td><h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">{{ $tendero->nombre }}</h2></td>
                    <td>
                        <a href="{{ route('listado.observations', $tendero->id) }}" class="btnTen" style="display: flex;justify-content:center;align-items:center">
                            <h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">Abrir</h2>
                        </a>
                    </td>
                    @if(auth()->user()->hasRole('admin'))
                        <td>
                            @foreach($tendero->observations as $observation)
                            <h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">{{ $observation->user->name }} <br></h2>
                            @endforeach
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
@endsection
