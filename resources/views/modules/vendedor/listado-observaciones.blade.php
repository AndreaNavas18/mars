@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Observaciones</title>

    <div class="divFormu">
        <h1>Observaciones de {{ ucwords($tendero->nombre) }}</h1>
        @foreach($observations as $key => $observation)
            <div class="formCrear">
                <div>
                    <label for="observacion">Observación {{ $key + 1 }} - Creada por {{ $observation->user->name }} </label>
                    <textarea name="observacion" id="observacion" cols="2" rows="2" class="form-control" readonly>{{ $observation->observacion }}</textarea>
                </div>
                @if(isset($observacionFiles[$observation->id]))
                    @foreach($observacionFiles[$observation->id] as $file)
                    <div class="file-preview" style="display: flex;align-items:center;justify-content:center">
                        <a href="{{ Storage::url($file->path) }}" target="_blank">
                            <img src="{{ Storage::url($file->path) }}" alt="{{ $file->name }}" style="max-width: 200px; max-height: 200px;">
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>

@endsection