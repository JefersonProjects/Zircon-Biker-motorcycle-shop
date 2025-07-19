const precioInput = document.getElementById('precio');
const minPrecioLabel = document.getElementById('min-precio-label');
const maxPrecioLabel = document.getElementById('max-precio-label');

precioInput.addEventListener('input', function() {
    const valor = this.value;
    minPrecioLabel.textContent = 'S/ 4,000';
    maxPrecioLabel.textContent = 'S/ ' + (valor < 50000 ? valor : '50,000+');
});

const filtros = document.querySelectorAll('.filtros');
filtros.forEach(
    filtro => {
        requestAnimationFrame(() => {
        filtro.oninput = function () {
            const valorf=precioInput.value;
            console.log(valorf);
            var busqueda = document.getElementById('busqueda').value;
            var categoria = document.getElementById('categoria').value;
            var marca = document.getElementById('marca').value;
            var minPrecio=4000;
            var maxPrecio=valorf;
            var ordenar = document.getElementById('ordenar').value;
            var peticion = new XMLHttpRequest();
            peticion.open('GET', '../../../ProyectoAvance2/CONFIG/flitroMotAjax.php?busqueda=' + busqueda + '&categoria=' + categoria + "&marca=" + marca + "&min_precio=" + minPrecio + "&max_precio=" + maxPrecio + "&ordenar=" + ordenar);
            peticion.onload = function () {
                if (peticion.status === 200) {
                    var motos = JSON.parse(peticion.responseText);
                    var html = '';
                    for (var i = 0; i < motos.length; i++) {
                        html += "<div class='catalogo-item'>";
                        html += "<img src='MOTOS/" + motos[i].id + "/principal.png'>";
                        html += "<h3>" + motos[i].nombre + "</h3>";
                        html += "<p>" + motos[i].descripcion + "</p>"
                        html += "<button type='button'>Quiero la Moto</button>";
                        html += "<h4>S/" + motos[i].precio + "</h4>";
                        html += "</div>";
                    }
                    const cont = document.getElementById('catalogo-contenedor');
                    cont.innerHTML = html;
                }
            };
            peticion.send();
        }
    });
    }
);
