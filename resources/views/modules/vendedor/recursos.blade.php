@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>¿Cómo participar?</title>

    <div class="adminTendTT">
        <ul style="list-style: none">
            <li class="videoPromo">
                <h2 style="color: #0000a0; text-align:center">Video Promocional</h2>
                <video width="320" height="240" controls class="videoStyles">
                    <source src="{{ asset('images/new/videoPromocional.mp4') }}" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
            </li>
            <li class="videoPromo" style="margin-top:20px">
                <h2 style="color: #0000a0; text-align:center">Manual de usuario vendedor</h2>
                <div style="text-align:center">
                    <embed src="{{ asset('archivos/manual_vendedor.pdf') }}" width="320" height="240" type="application/pdf" class="pdf-viewer">
                </div>
            </li>
        </ul>
    </div>
@endsection
