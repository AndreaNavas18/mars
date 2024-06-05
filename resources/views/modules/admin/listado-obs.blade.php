@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ secure_asset('css/global.css') }}">
    <title>Observaciones</title>

    <div class="divFormu">
        <h1>Observaciones de {{ ucwords($tendero->nombre) }}</h1>
        @foreach($observations as $key => $observation)
            <div class="formCrear">
                <label for="observacion">Observación {{ $key + 1 }}</label>
                <textarea name="observacion" id="observacion" cols="2" rows="2" class="form-control" readonly>{{ $observation->observacion }}</textarea>
            </div>
        @endforeach
    </div>

@endsection