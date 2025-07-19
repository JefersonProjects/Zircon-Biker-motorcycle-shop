<?php
include 'CONFIG/config.php';
require "CONFIG/obtenerCat.php"
?>

<?php

$conexion = new conexion();
$con = $conexion->conectar();


$sql = $con->prepare("SELECT id, nombre FROM marca_motos WHERE estado=1");
$sql->execute();
$resultadomarca = $sql->fetchAll(PDO::FETCH_ASSOC);
$sql = $con->prepare("SELECT id,nombre,descripcion,precio FROM motos WHERE estado=1");
$sql->execute();
$resultadomotos = $sql->fetchAll(PDO::FETCH_ASSOC);
$sql = $con->prepare("SELECT id,nombre FROM cat_motos WHERE estado=1");
$sql->execute();
$resultadocat = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Zircón Biker </title>
    <link rel="stylesheet" href="CSS/catalogo.css" />
</head>
<body>
    <?php
    include "header.php"
    ?>
    <h1 class="titulo-catalogo">Elige la moto de tus sueños en nuestro catálogo y revisa las ofertas inigualables que tenemos para ti <span class="oferta">¡Oferta!</span></h1>
<main>
        <div class="contenedor-principal">
            <div class="filtros-contenedor">
                <form method="POST" action="catalogoMotos.php">
                    <h3>Buscar:</h3>
                    <input type="text" class="filtros" id="busqueda" name="busqueda">
                    <h3>Filtros:</h3>

                    <!-- Categoría -->
                    <div class="filtro-grupo">
                        <label for="categoria">Categoría</label>
                        <select id="categoria" name="categoria" class="filtros">
                            <option value="">Todos</option>
                            <?php foreach ($resultadocat as $e) { ?>
                                <option value="<?php echo $e['id']; ?>"><?php echo $e['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Marca -->
                    <div class="filtro-grupo">
                        <label for="marca">Marca</label>
                        <select id="marca" name="marca" class="filtros">
                            <option value="">Todos</option>
                            <?php foreach ($resultadomarca as $e) { ?>
                                <option value="<?php echo $e['id']; ?>"><?php echo $e['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Precio -->
                    <div class="filtro-grupo">
                        <label for="precio">Precio</label>
                        <input type="range" id="precio" name="precio" min="4000" max="50000" step="1000" class="filtros">
                        <div class="rango-precio">
                            <span id="min-precio-label">S/ 4,000</span> - <span id="max-precio-label">S/ 50,000+</span>
                        </div>
                    </div>

                    <h3>Ordenar:</h3>
                    <select name="ordenar" id="ordenar" class="filtros">
                        <option value="">Predeterminado</option>
                        <option value="1">Ordenar por nombre</option>
                        <option value="2">Ordenar por precio de menor a mayor</option>
                        <option value="3">Ordenar por precio de mayor a menor</option>
                    </select>
                </form>
            </div>
            <div class="catalogo-contenedor" id="catalogo-contenedor">
                <?php foreach ($resultadomotos as $e) { ?>
                    <div class="catalogo-item">
                        <?php
                        $id = $e['id'];
                        $imagen = "MOTOS/" . $id . "/principal.png";
                        if (!file_exists($imagen)) {
                            $imagen = "imgs/default.png";
                        }
                        ?>
                        <img src="<?php echo $imagen; ?>" alt="<?php echo $e['nombre']; ?>">
                        <h3><?php echo $e['nombre']; ?></h3>
                        <p><?php echo $e['descripcion']; ?></p>
                        <form action="compraTransMot.php" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($e['id'], COD, KEY); ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($e['nombre'], COD, KEY); ?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($e['precio'], COD, KEY); ?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                            <button id="bacc" type="submit" name="boton" value="Agregar">
                                Quiero la moto
                            </button>
                        </form>
                        <h4>S/<?php echo $e['precio']; ?></h4>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <script src="JS/funcionalidades/filtroMotAjax.js"></script>
    <script type="module" src="JS/funcionalidades/index.js"></script>
    <script  type="module" src="JS/funcionalidades/slider.js"></script>
</body>

</html>