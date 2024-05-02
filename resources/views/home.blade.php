@extends('layouts.header')

@section('content')
    @can('vista.tendero')
    <div>
       @include('modules.tenderos.dashboard')
    </div>
    @endcan

    @can('vista.vendedor')
    <div>
        @include('modules.vendedores.dashboard')
    </div>
    @endcan

    @can('vista.admin')
    <div>
        @include('modules.administradores.dashboard')
    </div>
    @endcan
@endsection
