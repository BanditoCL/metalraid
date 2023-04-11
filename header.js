const menuToggle = document.getElementById('menu-toggle');
const navLinks = document.querySelector('.mrp-nav-links');

menuToggle.addEventListener('click', function() {
  if (navLinks.style.display === 'block') {
    navLinks.style.display = 'none';
  } else {
    navLinks.style.display = 'block';
  }
});

function hideNavLinks() {
  if (window.innerWidth > 710) {
    navLinks.style.display = 'block';
    menuToggle.style.display = 'none'; // Ocultar la opción de menú
  } else {
    navLinks.style.display = 'none';
    menuToggle.style.display = 'block'; // Mostrar la opción de menú
  }
}

window.addEventListener('resize', hideNavLinks);
hideNavLinks();