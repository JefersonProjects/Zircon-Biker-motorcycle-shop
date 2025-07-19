<?php

session_start();

$mensaje = '';

if (isset($_POST['boton'])) {
    switch ($_POST['boton']) {
        case 'Agregar':
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $id = openssl_decrypt($_POST['id'], COD, KEY);
            }
            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $nombre = openssl_decrypt($_POST['nombre'], COD, KEY);
            }
            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $precio = openssl_decrypt($_POST['precio'], COD, KEY);
            } 
            if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $cantidad = openssl_decrypt($_POST['cantidad'], COD, KEY);
            }
            if (!isset($_SESSION['CARRITO'])) {
                $producto = array(
                    'ID' => $id,
                    'NOMBRE' => $nombre,
                    'PRECIO' => $precio,
                    'CANTIDAD' => $cantidad,
                );
                $_SESSION['CARRITO'][0] = $producto;
                $_SESSION['mensaje'] = 'Producto agregado al carrito';
            } else {
                $idProductos = array_column($_SESSION['CARRITO'], 'ID');
                if (in_array($id, $idProductos)) {
                    $_SESSION['mensaje'] = 'El producto ya está en el carrito';
                } else {
                    $NumeroProductos = count($_SESSION['CARRITO']);
                    $producto = array(
                        'ID' => $id,
                        'NOMBRE' => $nombre,
                        'PRECIO' => $precio,
                        'CANTIDAD' => $cantidad,
                    );
                    $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                    $_SESSION['mensaje'] = 'Producto agregado al carrito';
                }
            }
            header("Location: accesorios.php");
            exit();
            break;

        case 'Eliminar':
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $id = openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje .= "Ok, Id correcto " . $id;
                foreach ($_SESSION['CARRITO'] as $e => $producto) {
                    if ($producto['ID'] == $id) {
                        unset($_SESSION['CARRITO'][$e]);
                        $_SESSION['mensaje'] = 'Elemento eliminado';
                    }
                }
            } else {
                $_SESSION['mensaje'] = 'Error';
            }
            break;

        case 'ModCant':
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $id = openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje .= "Ok, Id correcto " . $id;
                foreach ($_SESSION['CARRITO'] as $e => $producto) {
                    if ($producto['ID'] == $id) {
                        $_SESSION['CARRITO'][$e]['CANTIDAD']=$_POST['cantidad'];
                        $_SESSION['mensaje'] = 'Cantidad modificada';
                    }
                }
                header("Location: carritoShow.php");
                exit();
                break;
            }
    }
}
