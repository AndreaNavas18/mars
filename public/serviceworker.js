self.addEventListener('install', function(event) {
    event.waitUntil(
      caches.open('v1').then(function(cache) {
        return cache.addAll([
          '/',
          '/css/app.css',
          '/js/app.js',
          '/images/icons//marsvecino_72x72.png',
          '/images/icons//marsvecino_96x96.png',
          '/images/icons//marsvecino_128x128.png',
          '/images/icons//marsvecino_144x144.png',
          '/images/icons//marsvecino_152x152.png',
          '/images/icons//marsvecino_192x192.png',
          '/images/icons//marsvecino_384x384.png',
          '/images/icons//marsvecino_512x512.png',
        ]);
      })
    );
  });
  
  self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.match(event.request).then(function(response) {
        return response || fetch(event.request);
      })
    );
  });
  