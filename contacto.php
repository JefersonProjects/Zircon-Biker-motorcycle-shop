<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Zircón Biker </title>
    <link rel="stylesheet" href="CSS/contacto.css" />
    
</head>

<body>
    <?php
    include "header.php"
    ?>
    <main id="maincont">
        <div id="form">
            <h1 class="contact-saludo">¡Contáctenos!</h1>
            <form action="CONFIG/formulario.php" method="post">
                <label for="name">Nombre:</label><br>
                <input type="text" name="name" id="name" required><br>
                <label for="apellidos">Apellidos:</label><br>
                <input type="text" name="apellidos" id="apellidos" required><br>
                <label for="email">Correo Electrónico:</label><br>
                <input type="email" name="email" id="email" required><br>
                <label for="telefono">Teléfono:</label><br>
                <input type="tel" name="telefono" id="telefono"><br>
                <label for="consulta">Tipo de Consulta:</label><br>
                <select name="consulta" id="consulta">
                    <option value="asesoria">Asesoría</option>
                    <option value="consulta-precio">Consulta de Precio</option>
                    <option value="servicio-tecnico">Servicio Técnico</option>
                </select><br>
                <label for="mensaje">Mensaje:</label><br>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea><br>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>
    <?php
    include "footer.php"
    ?>

    <script type="module" src="JS/funcionalidades/index.js"></script>
</body>

</html>