@extends('layouts.appT')

@section('content')
        <link rel="stylesheet" href="{{ asset('css/tenderos/dashboard.css') }}">
        <script src="{{ asset('js/load.js') }}" defer></script>
        <div id="loading-container">
            <img src="{{ asset('images/new/cargandopng.gif') }}" class="loading" alt="Cargando">
        </div>
        <div class="contentTT">
            <div class="divPTT">
                <h1 class="punTT">${{ number_format(auth()->user()->tendero->drop_size, 0, ',', '.') }}</h1>
                <h2 class="tituTTT">META P10</h2>
            </div>
            <div class="opcTT">
                <h2 class="titu2TTT">Categorias</h2>
                <div class="cardssTT">
                    <div class="TT1">
                        <a href="{{ url('premios')}}" class="linksTT">
                            <div class="card1TT">
                                <div class="c1TT">
                                    <img src="{{ asset('images/new/premioo1.png') }}" class="iTT" alt="Premios">
                                    <h2 class="tit1TT">Lista de premios</h2>
                                </div>
                            </div>
                        </a>
                        <a href="{{ url('redimir')}}" class="linksTT">
                        <div class="card2TT">
                            <div class="c1TT">
                                <img src="{{ asset('images/new/redimir.png') }}" class="iTT" alt="Redimir">
                                <h2 class="tit1TT">¿Cómo participar?</h2>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="TT2" style="display: none">
                        <a href="{{ url('recursos')}}" class="linksTT">
                        <div class="card3TT">
                            <div class="c1TT">
                                <img src="{{ asset('images/new/recurso.png') }}" class="iTT" alt="Recursos">
                                <h2 class="tit1TT">Recursos</h2>
                            </div>
                        </div>
                        </a>
                        <a href="{{ url('marcas')}}" class="linksTT">
                        <div class="card4TT">
                            <div class="c1TT">
                                <img src="{{ asset('images/new/marcas1.png') }}" class="iTT" alt="Marcas">
                                <h2 class="tit1TT">Marcas participantes</h2>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <dialog class="modalTel" id="changeTelefonoModal">
            @if (session('error'))
                <div class="alert alert-danger" style="text-align:center;background-color:#ff000024;color:red;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px;font-family:'HelveticaBold', sans-serif">
                    {{ session('error') }}
                </div>
            @endif
            <form id="changeTelefonoForm">
                @csrf
                <h5>Hola tendero, bienvenido😊</h5>
                <h6>Solicitamos tu teléfono para poder contactarte más adelante</h6>
                <div>
                    <label for="telefono">Teléfono</label>
                    <input id="telefono" type="telefono" name="telefono" required>
                </div>
                <div>
                    <button type="button" onclick="changeTelefono()">Guardar</button>
                </div>
            </form>
        </dialog>
    
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if(auth()->user()->tendero->telefono == null)
                    document.getElementById('changeTelefonoModal').showModal();
                @endif
            });
    
            document.getElementById('changeTelefonoModal').addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    event.preventDefault();
                }
            });
    
            function changeTelefono() {
                let telefono = document.getElementById('telefono').value;
    
                clearErrors();
    
                let errors = [];
    
                if (telefono.length < 10) {
                    errors.push('Teléfono invalido');
                }
    
                if (errors.length > 0) {
                    showErrors(errors);
                    return;
                }
    
                axios.post('{{ route("change.telefono") }}', {
                    telefono: telefono,
                })
                .then(function(response) {
                    console.log(response.data);
                    document.getElementById('changeTelefonoModal').close();
                    window.location.replace("{{ route('home') }}");
                })
                .catch(function(error) {
                    console.error(error);
                    showErrors('Error al guardar el teléfono');
                });
            }
    
            
            function showErrors(messages) {
                messages.forEach(function(message) {
                    let errorDiv = document.createElement('div');
                    errorDiv.className = 'alert alert-danger';
                    errorDiv.style.backgroundColor = '#ff000024';
                    errorDiv.style.color = 'red';
                    errorDiv.style.fontWeight = 'bold';
                    errorDiv.style.height = '50px';
                    errorDiv.style.display = 'flex';
                    errorDiv.style.alignItems = 'center';
                    errorDiv.style.justifyContent = 'center';
                    errorDiv.style.borderRadius = '10px';
                    errorDiv.innerHTML = message;
                    
                    let form = document.getElementById('changeTelefonoForm');
                    form.parentNode.insertBefore(errorDiv, form);
                });
            }
    
            function clearErrors() {
                let errorMessages = document.querySelectorAll('.alert.alert-danger');
                errorMessages.forEach(function(message) {
                    message.remove();
                });
            }
    
        </script>
@endsection