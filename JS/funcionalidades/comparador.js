document.addEventListener('DOMContentLoaded', () => {
    const buscador = document.getElementById('buscador');
    const resultados = document.getElementById('resultados');
    const resultsContainer = document.querySelector('.results-dropdown-container');
    const maxMotos = 3; // Número máximo de motos a comparar

    // Mostrar resultados al escribir en el input
    buscador.addEventListener('input', function() {
        performSearch(this.value);
    });

    // Cerrar dropdown al hacer clic fuera del input
    document.addEventListener('click', function(event) {
        if (!resultsContainer.contains(event.target) && event.target !== buscador) {
            resultados.innerHTML = '';
            resultsContainer.style.display = 'none';
        }
    });

    // Reabrir dropdown al hacer clic en el input si hay texto
    buscador.addEventListener('focus', function() {
        if (this.value.length > 0) {
            performSearch(this.value);
        }
    });

    function performSearch(query) {
        if (query.length > 0) {
            fetch(`CONFIG/comparadorAjax.php?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    resultados.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(moto => {
                            let motoDiv = document.createElement('div');
                            motoDiv.innerHTML = highlightQuery(moto.moto_nombre, query);
                            motoDiv.addEventListener('click', function() {
                                fetch(`CONFIG/comparadorAjax.php?moto_nombre=${moto.moto_nombre}`)
                                    .then(response => response.json())
                                    .then(motoData => {
                                        addToComparador(motoData);
                                    });
                                resultados.innerHTML = '';
                                resultsContainer.style.display = 'none';
                            });
                            resultados.appendChild(motoDiv);
                        });
                        resultsContainer.style.display = 'block';
                    } else {
                        resultsContainer.style.display = 'none';
                    }
                });
        } else {
            resultados.innerHTML = '';
            resultsContainer.style.display = 'none';
        }
    }

    function highlightQuery(text, query) {
        let regex = new RegExp(`(${query})`, 'gi');
        return text.replace(regex, '<span class="highlight">$1</span>');
    }

    function addToComparador(motoData) {
        let comparador = document.getElementById('comparador');
        if (comparador.children.length < maxMotos) {
            let motoDiv = document.createElement('div');
            motoDiv.classList.add('moto-card');
            motoDiv.innerHTML = `
                <i class="fa-solid fa-circle-xmark delete-btn"></i>
                <img src="MOTOS/${motoData.id}/principal.png" alt="${motoData.moto_nombre}">
                <h3>${motoData.moto_nombre}</h3>
                <hr>
                <p><strong>Categoria:</strong> ${motoData.categoria_nombre}</p>
                <p><strong>Precio:</strong> S/ ${motoData.precio}</p>
                <p><strong>Marca:</strong> ${motoData.marca_nombre}</p>
            `;
            comparador.appendChild(motoDiv);

            // Agregar evento para eliminar la moto
            motoDiv.querySelector('.delete-btn').addEventListener('click', function() {
                motoDiv.remove();
            });
        } else {
            showAlert('!Recuerda¡ Solo puedes comparar hasta 3 motos.');
        }
    }

    function showAlert(message) {
        const alertDiv = document.createElement('div');
        alertDiv.classList.add('alert');
        alertDiv.innerText = message;

        document.body.appendChild(alertDiv);

        setTimeout(() => {
            alertDiv.remove();
        }, 3000); // Eliminar el mensaje después de 3 segundos
    }
});
