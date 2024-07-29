$(document).ready(function(){
    // Mostrar el menú desplegable al hacer clic en el ícono del menú hamburguesa
    $('#menuHamburguesa').click(function(){
        $('#menuDesplegable').toggle();
    });

    // Ocultar el menú desplegable al hacer clic en cualquier lugar fuera de él
    $(document).click(function(event) { 
        if(!$(event.target).closest('#menuHamburguesa').length && !$(event.target).closest('#menuDesplegable').length) {
            if($('#menuDesplegable').is(":visible")) {
                $('#menuDesplegable').hide();
            }
        }        
    });

});
