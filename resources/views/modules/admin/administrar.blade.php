@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Administrar tendero</title>

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
        <h1>Administracion de tendero</h1>
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
                        <a href="{{ route('edit.tendero', $tendero->id) }}" class="btnTen">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
@endsection
{{-- 
<input type="hidden" name="tendero_id" id="tendero_id" value="">
<div id="tendero_contenido" style="display: none"></div> --}}
