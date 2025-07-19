// FUNCION PARA EL TOGGLE DE BARRA//
const navtoggle = document.querySelector(".nav-toggle-zircon")
const navMenu = document.querySelector(".nav-menu-zircon")

navtoggle.addEventListener("click", () => {
    navMenu.classList.toggle("nav-menu_visible");

    if (navMenu.classList.contains("nav-menu_visible")) {
        navToogle.setAttribute("arial-label", "Cerrar menú");
    } else {
        navToogle.setAttribute("arial-label", "Abrir menú");
    }
});
             //cerrar automaticamente
        const navLinks = document.querySelectorAll(".nav-menu a");

        navLinks.forEach(link => {
            link.addEventListener("click", () => {
                navMenu.classList.remove("nav-menu_visible");
                navtoggle.setAttribute("aria-label", "Abrir menú");
            });
        });


//CARRUSEL EN EL INDEX SECCION 3 //
initCarrusel();
function initCarrusel() {
    const images = document.querySelectorAll('#galeria img');
    let currentImageIndex = 0;

    function changeImage() {
        images[currentImageIndex].classList.remove('active');
        currentImageIndex = (currentImageIndex + 1) % images.length;
        images[currentImageIndex].classList.add('active');
    }

    setInterval(changeImage, 3000); // Cambia la imagen cada 3 segundos
}

//IMPORTAMOS EL JS FINANCIAMIENTO
import { formularioFinanciamiento} from '../funcionalidades/financiamiento.js';
formularioFinanciamiento();



