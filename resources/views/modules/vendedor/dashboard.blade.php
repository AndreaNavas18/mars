@extends('layouts.appA')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <title>Inicio Vendedor</title>

    <div class="fondoAdmin">
        <div class="header2Admin">
            <h1 class="titleAdmin">Bienvenido {{ ucfirst(auth()->user()->name) }}</h1>
        </div>
        
        <div class="segDivAdmin">
            @if (session('success'))
                <div class="alert alert-success" style="background-color:#00800038;color:green;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" style="background-color:#ff000024;color:red;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px">
                    {{ session('error') }}
                </div>
            @endif
            <h2 class="title2Admin">¿Qué desea hacer hoy?</h2>
            <div class="obss btnInicial" id="menuObs">
                <a href="{{ route('listado.tenderos')}}" id="botonObs" class="botonObs"> <h2 style="font-family:'HelveticaBold', sans-serif;font-size:20px">Crear observación</h2></a>
            </div>
            <div class="creacionn btnInicial" id="menuCrear">
                <a href="{{ route('historial.observations')}}" id="botonCrear" class="botonCrear"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:20px">Historial observaciones</h2></a>
            </div>
            <div class="administrar btnInicial" id="menuAdmin">
                <a href="{{ route('activar.vista.tendero') }}" id="botonAdmin" class="botonAdmin"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:20px">Activar tendero</h2></a>
            </div>
            <div class="administrar btnInicial" id="menuAdmin">
                <a href="{{ route('terminos')}}" id="botonAdmin" class="botonAdmin"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:20px">Términos y condiciones</h2></a>
            </div>
            <div class="administrar btnInicial" id="menuAdmin">
                <a href="{{ route('recursos.vendedor') }}" id="botonAdmin" class="botonAdmin"><h2 style="font-family:'HelveticaBold', sans-serif;font-size:20px">¿Cómo participar?</h2></a>
            </div>
        </div>
    </div>


    <dialog class="modalContra" id="changePasswordModal">
        @if (session('error'))
            <div class="alert alert-danger" style="text-align:center;background-color:#ff000024;color:red;font-weight:bold;height:50px;display:flex;align-items:center;justify-content:center;border-radius:10px;font-family:'HelveticaBold', sans-serif">
                {{ session('error') }}
            </div>
        @endif
        <form id="changePasswordForm">
            @csrf
            <h5>Cambiar Contraseña</h5>
            <div>
                <label for="password">Nueva contraseña</label>
                <input id="password" type="password" name="password" required>
            </div>
            <div>
                <label for="password_confirmation">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <div>
                <button type="button" onclick="changePassword()">Guardar Contraseña</button>
            </div>
        </form>
    </dialog>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(auth()->user()->passwordchanged == 0)
                document.getElementById('changePasswordModal').showModal();
            @endif
        });

        document.getElementById('changePasswordModal').addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                event.preventDefault();
            }
        });

        function changePassword() {
            let password = document.getElementById('password').value;
            let passwordConfirmation = document.getElementById('password_confirmation').value;

            clearErrors();

            let errors = [];

            if (password !== passwordConfirmation) {
                errors.push('Las contraseñas no coinciden');
            }

            if (password.length < 6) {
                errors.push('La contraseña debe tener al menos 6 caracteres');
            }

            if (errors.length > 0) {
                showErrors(errors);
                return;
            }

            axios.post('{{ route("change.password") }}', {
                password: password,
                password_confirmation: passwordConfirmation
            })
            .then(function(response) {
                console.log(response.data);
                document.getElementById('changePasswordModal').close();
                window.location.replace("{{ route('home') }}");
            })
            .catch(function(error) {
                console.error(error);
                showError('Error al cambiar la contraseña');
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
                
                let form = document.getElementById('changePasswordForm');
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