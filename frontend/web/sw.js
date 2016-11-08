this.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open('v1').then(function(cache) {
      return cache.addAll([
        '/index.php',
        '/io1JyC.jpg'
      ]);
    })
  );
  this.addEventListener('fetch', function(event) {
  var response;
  new Response('<p>Hello from your friendly neighbourhood service worker!</p>', {
  headers: { 'Content-Type': 'text/html' }
});
caches.match('/fallback.html');
  event.respondWith(caches.match(event.request).catch(function() { 
  console.log("test");
    return fetch(event.request);
  }).then(function(r) {
    response = r;
    caches.open('v1').then(function(cache) {
      cache.put(event.request, response);
    });
    return response.clone();
  }).catch(function() {
    return caches.match('/io1JyC.jpg');
  }));
});
});