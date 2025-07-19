<?php
require 'conexion.php';
$conexion = new conexion();
$con = $conexion->conectar();

$categoriaID= $_GET['categoria'];

$sql = $con->prepare("SELECT id,nombre FROM motos WHERE estado=1 AND id_cat=$categoriaID");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

$motos=[];
foreach ($resultado as $e) {
    $motos[]=$e;
}

$json = json_encode($motos);

echo $json;