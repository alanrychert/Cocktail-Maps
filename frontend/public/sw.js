//asignar un nombre y versión al cache
const CACHE_NAME = 'v1_cache_CocktailMaps',
  urlsToCache = [
    './',
    './style.css',
    './script.js',
  ]

//durante la fase de instalación, generalmente se almacena en caché los activos estáticos
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(CACHE_NAME)
      .then(async cache => {
        await cache.addAll(urlsToCache)
        return self.skipWaiting()
      })
      .catch()
  )
})

//una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
  const cacheWhitelist = [CACHE_NAME]

  e.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            //Eliminamos lo que ya no se necesita en cache
            if (cacheWhitelist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName)
            }
          })
        )
      })
      // Le indica al SW activar el cache actual
      .then(() => self.clients.claim())
  )
})

//cuando el navegador recupera una url
self.addEventListener('fetch', e => {
  //Responder ya sea con el objeto en caché o continuar y buscar la url real
  e.respondWith(
    caches.match(e.request)
      .then(res => {
        if (res) {
          //recuperar del cache
          return res
        }
        

        return fetch(e.request).then(
          function(response) {
            // Si la respuesta es valida
            if(!response || response.status !== 200) {
              return response;
            }

            //Clonamos la respuesta, porque es un stream y tanto el navegador
            //como la cache lo van a consumir, entonces como no se puede consumir dos veces
            //el mismo stream, hay que clonar la respuesta
            var responseToCache = response.clone();

            caches.open(CACHE_NAME)
              .then(function(cache) {
                cache.put(e.request, responseToCache);
              });
            return response;
          }
        );
      })
  )
})