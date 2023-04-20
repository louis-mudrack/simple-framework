// Give body classes from document name

let documentName = document.location.pathname;

if (documentName.trim() === '/') {
  let documentName = 'index';
  document.body.classList.add(documentName);
} else {
  let documentName = document.location.pathname.split('/').pop().replace('.php', '');
  document.body.classList.add(documentName);
}

// Plugins

var lazyLoadInstance = new LazyLoad({
  // Your custom settings go here
});