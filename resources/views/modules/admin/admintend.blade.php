<div>
    <table class="tablaTendero">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Puntos</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenderos as $tendero)
            <tr>
                <td>{{ $tendero->nombre }} {{ $tendero->apellido }}</td>
                <td>{{ $tendero->puntos }}</td>
                <td>
                    <button class="btnTen" onclick="seleccionarTendero('{{ $tendero->id }}', 
                    '{{ $tendero->nombre }}', '{{ $tendero->apellido }}', 
                    '{{ $tendero->direccion }}', '{{ $tendero->telefono }}', 
                    '{{ $tendero->puntos }}')">Ver</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<input type="hidden" name="tendero_id" id="tendero_id" value="">
<div id="tendero_contenido" style="display: none"></div>

<script>
    // function seleccionarTendero(id, nombre) {
    //     document.getElementById('tendero_id').value = id;
    //     // Opcional: mostrar el nombre del tendero seleccionado
    //     document.getElementById('tendero_nombre').style.display = 'block';
    // }

    function seleccionarTendero(id, nombre) {
        document.getElementById('tendero_id').value = id;
        var tenderoContenido = document.getElementById('tendero_contenido');
        tenderoContenido.innerHTML = ""; // Limpiamos el contenido anterior
        tenderoContenido.innerHTML = `@include('modules.administradores.tend')`;
        tenderoContenido.style.display = 'block';
    }

    
</script>

