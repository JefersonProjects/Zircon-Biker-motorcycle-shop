<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Zircón Biker </title>
    <link rel="stylesheet" href="CSS/contado.css" />
</head>

<body>
    <?php
    include "header.php"
    ?>
    <main>
        <form action="CONFIG/venta_contado.php" method="POST" id="form">
            <br>
                <h3>Solicitar Venta</h3>
            <br>
            <label for="name">Moto:</label><br>
            <input type="text" name="moto" id="moto" required readonly value="<?php echo $_POST['nombre']?>"><br>
            <label for="name">Precio:</label><br>
            <input type="text" name="precio" id="precio" required readonly value=" S/ <?php echo $_POST['precio']?>"><br>
            <label for="name">Nombre:</label><br>
            <input type="text" name="nombres" id="nombres" required><br>
            <label for="apellidos">Apellidos:</label><br>
            <input type="text" name="apellidos" id="apellidos" required><br>
            <label for="email">Correo Electrónico:</label><br>
            <input type="email" name="correo" id="correo" required><br>
            <label for="telefono">Teléfono:</label><br>
            <input type="tel" name="telefono" id="telefono"><br>
            <label for="dni">DNI:</label><br>
            <input type="text" name="dni" id="dni"><br>
            <button type="submit" name="boton" valuer="pagar">Solicitar Venta</button>
        </form>
    </main>
    <?php
    include "footer.php"
    ?>
    <script type="module" src="JS/funcionalidades/index.js"></script>
</body>

</html>