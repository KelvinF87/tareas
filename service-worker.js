self.addEventListener('install', event => {
    event.waitUntil(
      caches.open('v1').then(cache => {
        return cache.addAll([
          '/',
          'index.html',
          'style.css',
          'js/addtarea.js',
          'js/listarnombre.js',
          'js/listartarea.js',
          'js/registrousuario.js',
          'js/session.js',
          'js/validausuario.js',
          'icons/icon-192x192.png',
          'icons/icon-512x512.png'
        ]);
      })
    );
  });
  
  self.addEventListener('fetch', event => {
    event.respondWith(
      caches.match(event.request).then(response => {
        return response || fetch(event.request);
      })
    );
  });
  