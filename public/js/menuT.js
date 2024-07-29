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

    let deferredPrompt;

    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;
        document.getElementById('installApp').style.display = 'block';
        console.log(deferredPrompt);
      });
  
      window.addEventListener('appinstalled', (event) => {
        console.log('PWA instalada con éxito');
        console.log(event);
      });
  
      document.getElementById('installApp').addEventListener('click', async () => {
        console.log(deferredPrompt);
        if (deferredPrompt) {
          deferredPrompt.prompt();
          const { outcome } = await deferredPrompt.userChoice;
          if (outcome === 'accepted') {
            console.log('Usuario aceptó la instalación');
          } else {
            console.log('Usuario rechazó la instalación');
          }
          deferredPrompt = null;
        }
      });
});
