const precioInput = document.getElementById('precio');
const minPrecioLabel = document.getElementById('min-precio-label');
const maxPrecioLabel = document.getElementById('max-precio-label');

precioInput.addEventListener('input', function () {
    const valor = this.value;
    minPrecioLabel.textContent = 'S/ 150';
    maxPrecioLabel.textContent = 'S/ ' + (valor < 1000 ? valor : '1,000+');
});

const filtros = document.querySelectorAll('.filtros');
filtros.forEach(
    filtro => {
        requestAnimationFrame(() => {
            filtro.oninput = function () {
                const valorf = precioInput.value;
                console.log(valorf);
                var busqueda = document.getElementById('busqueda').value;
                var categoria = document.getElementById('categoria').value;
                var marca = document.getElementById('marca').value;
                var minPrecio = 150;
                var maxPrecio = valorf;
                console.log(minPrecio);
                console.log(maxPrecio);
                var ordenar = document.getElementById('ordenar').value;
                var peticion = new XMLHttpRequest();
                peticion.open('GET', '../../../ProyectoAvance2/CONFIG/flitroAcceAjax.php?busqueda=' + busqueda + '&categoria=' + categoria + "&marca=" + marca + "&min_precio=" + minPrecio + "&max_precio=" + maxPrecio + "&ordenar=" + ordenar);
                peticion.onload = function () {
                    if (peticion.status === 200) {
                        var acce = JSON.parse(peticion.responseText);
                        var html = '';
                        for (var i = 0; i < acce.length; i++) {
                            html += "<div class='catalogo-item'>";
                            html += "<img src='imgs/Accesorios/" + acce[i].id + "/principal.png'>";
                            html += "<h3>" + acce[i].nombre + "</h3>";
                            html += "<p>" + acce[i].descripcion + "</p>"
                            html += "<button id='bacc' type='button'>Añadir</button>";
                            html += "<h4>S/" + acce[i].precio + "</h4>";
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
