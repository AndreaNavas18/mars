document.addEventListener("DOMContentLoaded", function() {
    // Ocultar la pantalla de carga después de 2 segundos
    setTimeout(function() {
        document.getElementById('loading-container').style.display = 'none';
    }, 2000); // 2000 milisegundos = 2 segundos
});