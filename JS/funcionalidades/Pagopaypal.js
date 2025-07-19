document.addEventListener('DOMContentLoaded', function() {
    const total = "<?php echo number_format($total, 2, '.', ''); ?>";
    
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transacción completada por ' + details.payer.name.given_name);
                let modal = document.getElementById('modalPago');
                modal.classList.remove('hidden');
                modal.style.display = 'block';

                modal.querySelector('.close').onclick = function() {
                    modal.style.display = 'none';
                }

                generarPDF();
            });
        }
    })
});

function generarPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const name = document.getElementById('name').value;
    const apellidos = document.getElementById('apellidos').value;
    const email = document.getElementById('email').value;
    const telefono = document.getElementById('telefono').value;
    const dni = document.getElementById('dni').value;
    const total = '<?php echo number_format($total, 2); ?>';

    doc.text('Boleta de Compra', 10, 10);
    doc.text(`Nombre: ${name}`, 10, 20);
    doc.text(`Apellidos: ${apellidos}`, 10, 30);
    doc.text(`Correo Electrónico: ${email}`, 10, 40);
    doc.text(`Teléfono: ${telefono}`, 10, 50);
    doc.text(`DNI: ${dni}`, 10, 60);
    doc.text(`Total: S/ ${total}`, 10, 70);

    doc.save('boleta.pdf');
}

