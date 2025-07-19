<?php
include 'CONFIG/config.php';
include 'CONFIG/carrito.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Carrito </title>
    <link rel="stylesheet" href="CSS/carrito.css" />
    <script src="https://www.paypal.com/sdk/js?client-id=Aaadd8UbQdGx6XgH78_ExGJSDz4zy3tuXZ_93ENCPLWqG5RqhRo09xCf-B0ZCTBSqdYCpVDMwH77TvM5&components=buttons"></script>

</head>
<body class="carrito-body">
    <?php
    include "header.php"
    ?>

<main>
        <div id="notification" class="hidden">Producto agregado al carrito</div>
        <h3>Contenido del carrito</h3>
        <?php if (!empty($_SESSION['CARRITO'])) { ?>
        <table id="tabla-carrito">
            <tbody>
                <tr>
                    <th width="40%">Descripcion</th>
                    <th width="15%">Cantidad</th>
                    <th width="20%">Precio</th>
                    <th width="20%">Total</th>
                    <th width="5%">Acciones</th>
                </tr>
                <?php $total=0;?>
                <?php foreach ($_SESSION['CARRITO'] as $e=>$producto){?>
                <tr>
                    <td width="40%"><?php echo $producto['NOMBRE'];?></td>
                    <td width="15%">
                        <form action="" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                            <input type="number" name="cantidad" id="cantidad" min="1" max="10" value="<?php echo $producto['CANTIDAD'];?>">
                            <button class="btnModCant" id="btnModCant" type="submit" name="boton" value="ModCant"><i class="fa-solid fa-rotate-right"></i></button>
                        </form>
                    </td>
                    <td width="20%">S/<?php echo $producto['PRECIO'];?></td>
                    <td width="20%">S/ <?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
                    <td width="5%">
                        <form action="" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                            <button class="btnEliminar" type="submit" name="boton" value="Eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php $total = $total +($producto['PRECIO']*$producto['CANTIDAD']);?>
                <?php }?>

                <tr>
                    <td colspan="3" align="right"><h3>Total</h3></td>
                    <td align="right"><h3> S/ <?php echo number_format($total,2);?></h3></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <h3>Finalizar compra con Paypal</h3>
        <form action="pago.php" method="POST" id="form">
            <label for="name">Nombre:</label><br>
            <input type="text" name="name" id="name" required><br>
            <label for="apellidos">Apellidos:</label><br>
            <input type="text" name="apellidos" id="apellidos" required><br>
            <label for="email">Correo Electrónico:</label><br>
            <input type="email" name="email" id="email" required><br>
            <label for="telefono">Teléfono:</label><br>
            <input type="tel" name="telefono" id="telefono"><br>
            <label for="dni">DNI:</label><br>
            <input type="text" name="dni" id="dni"><br>
            <div id="paypal-button-container"></div>
        </form>
        <?php } else { ?>
        <div class="Alert-Vacio">
            <h3>No hay elementos en el carrito.....</h3>
        </div>
        <?php } ?>
    </main>

    <div id="modalPago" class="modal hidden">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>¡Pago completado con éxito!</p>
            <i class="fa fa-check-circle" style="font-size: 5em; color: green;"></i>
        </div>
    </div>

    <?php include "footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="JS/funcionalidades/index.js"></script>
    <script src="JS/funcionalidades/Pagopaypal.js"></script>
    <script src="JS/funcionalidades/alerta.js"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo number_format($total, 2, '.', ''); ?>'
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
        }).render('#paypal-button-container');

        function generarPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            const name = document.getElementById('name').value;
            const apellidos = document.getElementById('apellidos').value;
            const email = document.getElementById('email').value;
            const telefono = document.getElementById('telefono').value;
            const dni = document.getElementById('dni').value;

            doc.text('Boleta de Compra', 10, 10);
            doc.text(`Nombre: ${name}`, 10, 20);
            doc.text(`Apellidos: ${apellidos}`, 10, 30);
            doc.text(`Correo Electrónico: ${email}`, 10, 40);
            doc.text(`Teléfono: ${telefono}`, 10, 50);
            doc.text(`DNI: ${dni}`, 10, 60);
            doc.text(`Total: S/ ${'<?php echo number_format($total, 2); ?>'}`, 10, 70);
            doc.save('boleta.pdf');
        }
    </script>
</body>

</html>