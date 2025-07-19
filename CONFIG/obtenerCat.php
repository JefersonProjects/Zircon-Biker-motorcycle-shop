<?php

require 'conexion.php';
$conexion = new conexion();
$con = $conexion->conectar();

$sql = $con->prepare("SELECT id,nombre FROM cat_motos WHERE estado=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
