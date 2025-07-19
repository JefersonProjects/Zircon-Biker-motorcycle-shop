//FUNCIONALIDAD DEL FORMULARIO DE FINANCIAMIENTO (FILTRADO DE DEP,PROV Y DIS)
export function formularioFinanciamiento(){
document.addEventListener('DOMContentLoaded', function() {
    const departamentos = {
        'ica': ['Ica', 'Pisco', 'Chincha', 'Nazca', 'Palpa'],
        'lima': ['Lima', 'Callao', 'Barranca', 'Cañete', 'Canta', 'Huaral']
    };

    const provincias = {
        'ica': {
            'ica': ['Ica', 'Parcona','Tinguiña'],
            'pisco': ['Pisco', 'Independencia'],
            'chincha': ['Chincha Alta', 'Alto Laran'],
            'nazca': ['Nazca', 'Changuillo','El Ingenio'],
            'palpa': ['Palpa', 'Tibillo']
        },
        'lima': {
            'lima': ['Miraflores', 'San Isidro'],
            'callao': ['Bellavista', 'La Perla'],
            'barranca': ['Supe', 'Paramonga'],
            'cañete': ['San Vicente', 'Imperial'],
            'canta': ['Arahuay', 'San Buenaventura'],
            'huaral': ['Atavillos Alto', 'Atavillos Bajo']
        }
    };

    const departamentoSelect = document.getElementById('departamento');
    const provinciaSelect = document.getElementById('provincia');
    const distritoSelect = document.getElementById('distrito');

    departamentoSelect.addEventListener('change', function() {
        const selectedDepartamento = departamentoSelect.value.toLowerCase();
        provinciaSelect.innerHTML = '<option value="">Selecciona la provincia</option>';
        distritoSelect.innerHTML = '<option value="">Selecciona el distrito</option>';

        if (selectedDepartamento) {
            const provinciasOptions = departamentos[selectedDepartamento];
            provinciasOptions.forEach(function(provincia) {
                const option = document.createElement('option');
                option.value = provincia.toLowerCase();
                option.textContent = provincia;
                provinciaSelect.appendChild(option);
            });
        }
    });

    provinciaSelect.addEventListener('change', function() {
        const selectedDepartamento = departamentoSelect.value.toLowerCase();
        const selectedProvincia = provinciaSelect.value.toLowerCase();
        distritoSelect.innerHTML = '<option value="">Selecciona el distrito</option>';

        if (selectedProvincia && provincias[selectedDepartamento]) {
            const distritosOptions = provincias[selectedDepartamento][selectedProvincia];
            distritosOptions.forEach(function(distrito) {
                const option = document.createElement('option');
                option.value = distrito.toLowerCase();
                option.textContent = distrito;
                distritoSelect.appendChild(option);
            });
        }
    });
});

    
}