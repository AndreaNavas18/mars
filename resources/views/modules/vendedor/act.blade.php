@extends('layouts.appA')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/jsqr"></script>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 10px">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Activar Tendero') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('activar.tendero') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Cédula') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autofocus>

                                    @error('username')
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
                                <div class="col-md-2">
                                    <label for="qr_image" class="btn" style="background-color: #81267f; color:white; margin-top:10px">Seleccionar imagen de galería</label>
                                    <input type="file" id="qr_image" name="qr_image" style="display:none" accept="image/*" onchange="handleImageUpload(event)">
                                </div>
                                {{-- <div class="col-md-2">
                                    <button type="button" class="btn" style="background-color: #81267f; color:white; margin-top:10px" onclick="openScanner()">Escanear con cámara</button>
                                </div> --}}
                            </div>

                            <div class="form-group row mb-0" style="margin-top: 10px">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn" style="background-color: #81267f; color:white">
                                        {{ __('Activar Tendero') }}
                                    </button>
                                </div>
                            </div>
                        </form>
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
    </script>
@endsection
