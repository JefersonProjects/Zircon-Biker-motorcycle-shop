<?php
require 'conexion.php';
$conexion = new conexion();
$con = $conexion->conectar();

$busqueda=$_GET['busqueda'];
$categoria=$_GET['categoria'];
$marca=$_GET['marca'];
$min_precio=$_GET['min_precio'];
$max_precio=$_GET['max_precio'];
$ordenar=$_GET['ordenar'];

if (!isset($busqueda)) {
    $busqueda = '';
}
if (!isset($categoria)) {
    $categoria = '';
}
if (!isset($marca)) {
    $marca = '';
}
if (!isset($min_precio)) {
    $min_precio = '';
}
if (!isset($max_precio)) {
    $max_precio = '';
}
if (!isset($ordenar)) {
    $ordenar = '';
}
        //busqueda
        if ($busqueda == '') {
            $busqueda = ' ';
        }
        $palabra = explode(" ", $busqueda);
        if (
            $busqueda = '' and $categoria = '' and $marca = '' and $min_precio = ''
            and $max_precio = '' and $ordenar = ''
        ) {
            $query = "SELECT id,nombre,descripcion,precio FROM accesorios WHERE estado=1";
        } else {
            $query = "SELECT id,nombre,descripcion,precio FROM accesorios WHERE estado=1";
            if ($busqueda != ' ') {
                $query .= " AND nombre LIKE LOWER('%" .$palabra[0]. "%')";
                for ($i = 1; $i < count($palabra); $i++) {
                    if (!empty($palabra[$i])) {
                        $query .= " OR nombre LIKE '%" . $palabra[$i] . "%'";
                    }
                }
            }
        }
        //filtros
        if ($categoria != '') {
            $query .= " AND id_cat = '" . $categoria . "'";
        }
        if ($marca != '') {
            $query .= " AND id_marca = '" . $marca . "'";
        }
        if ($min_precio != '') {
            $query .= " AND precio >= '" . $min_precio . "'";
        }
        if ($max_precio != '') {
            $query .= " AND precio <= '" . $max_precio . "'";
        }
        //orden
        if ($ordenar == '1') {
            $query .= " ORDER BY nombre ASC";
        }
        if ($ordenar == '2') {
            $query .= " ORDER BY precio ASC";
        }
        if ($ordenar == '3') {
            $query .= " ORDER BY precio DESC";
        }
        $sql = $con->prepare($query);
        $sql->execute();
        $resultadom = $sql->fetchAll(PDO::FETCH_ASSOC);
//codificar en un json
$acce = [];
foreach ($resultadom as $e) {
    $acce[] = $e;
}

$json = json_encode($acce);

echo $json;
