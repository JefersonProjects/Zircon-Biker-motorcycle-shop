<?php
require 'conexion.php';
session_start();

$moto = $_POST['moto'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$celular=$_POST['celular'];
$correo=$_POST['correo'];
$numero_documento=$_POST['numero_documento'];
$departamento=$_POST['departamento'];
$provincia=$_POST['provincia'];
$distrito=$_POST['distrito'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$situacion_laboral=$_POST['situacion_laboral'];
$cuota_inicial=$_POST['cuota_inicial'];
$ingreso_mensual=$_POST['ingreso_mensual'];
date_default_timezone_set('America/Lima');
$fechaHoraActual = date('Y-m-d H:i:s');





$conexion = new conexion();

$con = $conexion->conectar();


$sql = "INSERT INTO pedidos_financiamiento (moto, nombres, apellidos, celular, correo, 
numero_documento, departamento, provincia, distrito, fecha_nacimiento, situacion_laboral, 
cuota_inicial, ingreso_mensual, fecha_pedido) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);

$stmt->bindParam(1, $moto);
$stmt->bindParam(2, $nombres);
$stmt->bindParam(3, $apellidos);
$stmt->bindParam(4, $celular);
$stmt->bindParam(5, $correo);
$stmt->bindParam(6, $numero_documento);
$stmt->bindParam(7, $departamento);
$stmt->bindParam(8, $provincia);
$stmt->bindParam(9, $distrito);
$stmt->bindParam(10, $fecha_nacimiento);
$stmt->bindParam(11, $situacion_laboral);
$stmt->bindParam(12, $cuota_inicial);
$stmt->bindParam(13, $ingreso_mensual);
$stmt->bindParam(14, $fechaHoraActual);


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
$formato = file_get_contents('plantillasHTML/plantillaFinanCliente.html');
$formato = str_replace(
    ['[[moto]]', '[[nombres]]', '[[apellidos]]','[[fecha]]'],
    [$moto, $nombres, $apellidos,$fechaHoraActual],
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
$adformato = file_get_contents('plantillasHTML/plantillaFinanAdmin.html');
$adformato = str_replace(
    ['[[moto]]', '[[nombres]]', '[[apellidos]]','[[fecha]]','[[celular]]','[[correo]]',
    '[[numero_documento]]','[[departamento]]','[[provincia]]','[[distrito]]',
    'fecha_nacimiento','situacion_laboral','cuota_inicial','ingreso_mensual'],
    [$moto, $nombres, $apellidos,$fechaHoraActual,$celular,$correo,$numero_documento,
    $departamento,$provincia,$distrito,$fecha_nacimiento,$situacion_laboral,
    $cuota_inicial,$ingreso_mensual],
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

$_SESSION['mensaje'] = 'Financiamiento registrado, espere nuestra respuesta';
header("Location: ../index.php");
exit;
