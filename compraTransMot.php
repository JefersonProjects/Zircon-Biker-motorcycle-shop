<?php
require 'CONFIG/conexion.php';
include 'CONFIG/config.php';
$conexion = new conexion();
$con = $conexion->conectar();

$id = openssl_decrypt($_POST['id'], COD, KEY);

$sql = $con->prepare("SELECT * FROM motos WHERE estado=1 AND id='$id'");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
$moto = $resultado[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Zircón Biker </title>
    <link rel="stylesheet" href="CSS/compraTransMot.css" />
</head>

<body>
    <?php
    include "header.php"
    ?>
    <main>
        <div class="catalogo-container">
            <div class="catalogo-item">
                <?php
                $id = $moto['id'];
                $imagen = "MOTOS/" . $id . "/principal.png";
                if (!file_exists($imagen)) {
                    $imagen = "imgs/default.png";
                }
                ?>
                <img src="<?php echo $imagen; ?>" alt="<?php echo $moto['nombre']; ?>">
                <h3><?php echo $moto['nombre']; ?></h3>
                <p><?php echo $moto['descripcion'];  ?></p>
                <h4>S/<?php echo $moto['precio'];  ?></h4>
            </div>
            <div class="payment-container">
                <h3>Elija un método de pago</h3>
                <form action="contado.php" method="POST">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo $moto['nombre']; ?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo $moto['precio'];  ?>">
                    <button class="Tip-Button" type="submit">
                        Comprar al contado
                    </button>
                </form>
                <form action="financiamiento.php" method="POST">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo $moto['nombre']; ?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo $moto['precio'];  ?>">
                    <input type="hidden" name="categoria" id="categoria" value="<?php echo $moto['id_cat'];  ?>">
                    <button class="Tip-Button" type="submit">
                        Solicitar Financiamiento
                    </button>
                </form>
            </div>
        </div>
    </main>
    <?php
    include "footer.php"
    ?>
    <script type="module" src="JS/funcionalidades/index.js"></script>
</body>

</html>