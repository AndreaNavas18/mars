@extends('layouts.appA')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/jsqr"></script>
<div class="container">
    <div class="row justify-content-center" style="margin-top: 10px">
        <div class="col-md-8">
            <div class="card">
                @if (session('success'))
                <div class="alert alert-success" style="background-color:#00800038;color:green;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                <div class="alert alert-danger" style="background-color:#ff000024;color:red;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="cardTitle"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:24px">{{ __('Activar Tendero') }}</h2></div>

                <div class="card-body">
                    <form class="formActivacion" method="POST" action="{{ route('activar.tendero') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:18px">{{ __('Cédula') }}</h2></label>

                            <div class="col-md-6">
                                <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" required autofocus>

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:18px">{{ __('Teléfono') }}</h2></label>

                            <div class="col-md-6">
                                <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="token" class="col-md-4 col-form-label text-md-right"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:18px">{{ __('Token QR') }}</h2></label>

                            <div class="col-md-6">
                                <input id="token" type="text" class="form-control @error('token') is-invalid @enderror" name="token" readonly>

                                @error('token')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="divBtnQR">
                        <div class="divBtn">
                            <label for="qr_image" class="btnQR"> 
                                <h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">Seleccionar de la galería</h2>
                            </label>
                            <input type="file" id="qr_image" name="qr_image" style="display:none" accept="image/*" onchange="handleImageUpload(event)">
                        </div>
                        <div class="divBtn">
                            <button type="button" class="btnQR" onclick="openScanner()"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">Escanear con cámara</h2></button>
                        </div>
                    </div>
                    <div class="divBtnActivar">
                        <button type="submit" class="btnActivar">
                            <h2 style="font-family:'HelveticaBold', sans-serif;font-size:15px">{{ __('Activar Tendero') }}</h2>
                        </button>
                    </div>
                        </form>

                    <div id="video-container" style="display: none; margin-top: 20px;" class="escanearC">
                        <video id="video" width="320" height="240"></video>
                        <button type="button" class="btn btn-danger" onclick="closeScanner()">Cerrar Cámara</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .escanearC video {
        border: 1px solid #ffc547;
        border-radius: 5px;
    }

    .escanearC button {
        background-color: #ff0000;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin-top: 10px;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .escanearC button:hover {
        background-color: white;
        color: #ff0000;
        border: 1px solid #ff0000;
    }
    
    .escanearC button:active {
        background-color: white;
        color: #ff0000;
        border: 1px solid #ff0000;
    }
</style>

<script>

document.getElementById('qr_image').addEventListener('change', handleImageUpload);

    function handleImageUpload(event) {
        console.log('Galeria abierta');
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(event) {
            var image = new Image();
            image.onload = function() {
                var imageData = getImageDataFromCanvas(image);
                var code = jsQR(imageData.data, imageData.width, imageData.height);
                if (code) {
                    var token = code.data.split('/').pop();
                    document.getElementById('token').value = token;
                } else {
                    console.log('No se detectó ningún código QR en la imagen.');
                }
            };
            image.src = event.target.result;
        };
        reader.readAsDataURL(file);

    }

    function getImageDataFromCanvas(image) {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        canvas.width = image.width;
        canvas.height = image.height;
        context.drawImage(image, 0, 0);
        return context.getImageData(0, 0, canvas.width, canvas.height);
    }

    function openScanner() {
        document.getElementById('video-container').style.display = 'block';
        var video = document.getElementById('video');

        navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } }).then(function(stream) {
            video.srcObject = stream;
            video.setAttribute('playsinline', true); // required to tell iOS safari we don't want fullscreen
            video.play();
            requestAnimationFrame(tick);
        });
    }

    function closeScanner() {
        var video = document.getElementById('video');
        video.srcObject.getTracks().forEach(track => track.stop());
        document.getElementById('video-container').style.display = 'none';
    }

    function tick() {
        var video = document.getElementById('video');
        if (video.readyState === video.HAVE_ENOUGH_DATA) {
            var canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            var context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            var imageData = context.getImageData(0, 0, canvas.width, canvas.height);
            var code = jsQR(imageData.data, imageData.width, imageData.height);

            if (code) {
                var token = code.data.split('/').pop();
                document.getElementById('token').value = token;
                closeScanner();
                return;
            }
        }
        requestAnimationFrame(tick);
    }
</script>
@endsection
