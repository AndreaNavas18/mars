// En public/js/bootstrap.js

require('bootstrap'); // Asegúrate de incluir Bootstrap en tu HTML

// Cargar axios
const axios = require('axios');
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Si estás usando Laravel Echo y Pusher, asegúrate de incluir las bibliotecas necesarias
// Puedes comentar o descomentar estas líneas según sea necesario

// const Echo = require('laravel-echo');
// const Pusher = require('pusher-js');
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key', // Reemplaza con tu clave de Pusher
//     cluster: 'mt1', // Reemplaza con tu clúster de Pusher
//     wsHost: 'ws-mt1.pusher.com',
//     wsPort: 80,
//     wssPort: 443,
//     forceTLS: true,
//     enabledTransports: ['ws', 'wss'],
// });
