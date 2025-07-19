<?php
include 'conexion.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    
    $conexion = new conexion();
    $con = $conexion->conectar();
    
    $sql = $con->prepare("
        SELECT m.id, m.nombre AS moto_nombre
        FROM motos m
        WHERE m.estado = 1 AND m.nombre LIKE ?
    ");
    $sql->execute(["%$query%"]);
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
} elseif (isset($_GET['moto_nombre'])) {
    $moto_nombre = $_GET['moto_nombre'];
    
    $conexion = new conexion();
    $con = $conexion->conectar();
    
    $sql = $con->prepare("
        SELECT m.id, m.nombre AS moto_nombre, c.nombre AS categoria_nombre, m.precio, ma.nombre AS marca_nombre
        FROM motos m
        JOIN cat_motos c ON m.id_cat = c.id
        JOIN marca_motos ma ON m.id_marca = ma.id
        WHERE m.estado = 1 AND m.nombre = ?
    ");
    $sql->execute([$moto_nombre]);
    $result = $sql->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
?>
