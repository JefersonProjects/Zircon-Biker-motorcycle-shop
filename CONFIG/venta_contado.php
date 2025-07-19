<?php
require 'conexion.php';
session_start();

$moto = $_POST['moto'];
$precio = $_POST['precio'];
$precioint = filter_var($precio, FILTER_SANITIZE_NUMBER_INT);
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$dni=$_POST['dni'];
date_default_timezone_set('America/Lima');
$fechaHoraActual = date('Y-m-d H:i:s');

$conexion = new conexion();

$con = $conexion->conectar();

$sql = "INSERT INTO pedidos_venta_contado (moto, precio, nombres, apellidos, correo, 
telefono, dni, fecha_pedido) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);

$stmt->bindParam(1, $moto);
$stmt->bindParam(2, $precioint);
$stmt->bindParam(3, $nombres);
$stmt->bindParam(4, $apellidos);
$stmt->bindParam(5, $correo);
$stmt->bindParam(6, $telefono);
$stmt->bindParam(7, $dni);
$stmt->bindParam(8, $fechaHoraActual);

$stmt->execute();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//enviado de correo al cliente
$asunto = "Mensaje del sitio web Zircon Biker";
//formato del correo
$formato = file_get_contents('plantillasHTML/plantillaVenCon.html');
$formato = str_replace(
    ['[[moto]]', '[[nombres]]', '[[apellidos]]','[[fecha]]','[[precio]]'],
    [$moto, $nombres, $apellidos,$fechaHoraActual,$precioint],
    $formato
);
//phpmailer
$mail = new PHPMailer(true);
//configuramos los parametros y enviamos un correo
try {

    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'oswaldocabrejosr@gmail.com';                     
    $mail->Password   = 'nagaabuwzwgqbcyg';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom('oswaldocabrejosr@gmail.com', 'ZirconBiquer');
    $mail->addAddress($correo);     

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = $asunto;
    $mail->Body    = $formato;


    $mail->send();
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
    exit;
}


//enviado de correo al administrador
$adasunto = "Mensaje del sitio web Zircon Biker:Solicitud de financiamiento";
//phpmailer
$adformato = file_get_contents('plantillasHTML/plantillaVenConAdmin.html');
$adformato = str_replace(
    ['[[moto]]', '[[nombres]]', '[[apellidos]]','[[fecha]]','[[correo]]','[[telefono]]','[[dni]]'],
    [$moto, $nombres, $apellidos,$fechaHoraActual,$correo,$telefono,$dni],
    $adformato
);

$admail = new PHPMailer(true);
//configuramos los parametros y enviamos un correo
try {

    $admail->SMTPDebug = 0;                     
    $admail->isSMTP();                                           
    $admail->Host       = 'smtp.gmail.com';                     
    $admail->SMTPAuth   = true;                                   
    $admail->Username   = 'oswaldocabrejosr@gmail.com';                     
    $admail->Password   = 'nagaabuwzwgqbcyg';                               
    $admail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $admail->Port       = 465;                                    

    //Recipients
    $admail->setFrom('oswaldocabrejosr@gmail.com', 'ZirconBiquer');
    $admail->addAddress('jeffersonalejandro943@gmail.com');     

    //Content
    $admail->isHTML(true);                                  
    $admail->Subject = $adasunto;
    $admail->Body    = $adformato;


    $admail->send();
} catch (Exception $e) {
    echo "Error al enviar: {ad$mail->ErrorInfo}";
    exit;
}


$_SESSION['mensaje'] = 'Venta registrada, espere nuestra respuesta';
//header("Location: ../index.php");
exit;


