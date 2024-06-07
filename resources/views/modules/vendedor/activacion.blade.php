@extends('layouts.appA')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/jsqr"></script>
<div class="container">
    <div class="row justify-content-center" style="margin-top: 10px">
        <div class="col-md-8">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="cardTitle">{{ __('Activar Tendero') }}</div>

                <div class="card-body">
                    <form class="formActivacion" method="POST" action="{{ route('activar.tendero') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cédula') }}</label>

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
                            <label for="token" class="col-md-4 col-form-label text-md-right">{{ __('Token QR') }}</label>

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
                            <label for="qr_image" class="btnQR" >Seleccionar imagen de galería</label>
                            <input type="file" id="qr_image" name="qr_image" style="display:none" accept="image/*" onchange="handleImageUpload(event)">
                        </div>
                        <div class="divBtn">
                            <button type="button" class="btnQR" onclick="openScanner()">Escanear con cámara</button>
                        </div>
                    </div>
                    <div class="divBtnActivar">
                        <button type="submit" class="btnActivar">
                            {{ __('Activar Tendero') }}
                        </button>
                    </div>
                        </form>

                    <div id="video-container" style="display: none; margin-top: 20px;">
                        <video id="video" width="320" height="240" style="border: 1px solid black"></video>
                        <button type="button" class="btn btn-danger" onclick="closeScanner()">Cerrar Cámara</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleImageUpload(event) {
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
