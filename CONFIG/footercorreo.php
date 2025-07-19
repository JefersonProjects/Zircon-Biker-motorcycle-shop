<?php

require 'conexion.php';
$conexion = new conexion();
$con = $conexion->conectar();

$email=$_POST['correonuevo'];

$sql = $con->prepare("INSERT INTO correoselectronicos_noticias (correo) VALUES (?)");
$sql->execute([$email]);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$email = $_POST['correonuevo'];


//formato del correo
$formato = "¡¡Gracias por suscribirse a Zircon Biker!!";


$asunto = "Mensaje del sitio web Zircon Biker";
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
    $mail->addAddress($email );     

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = $asunto;
    $mail->Body    = $formato;


    $mail->send();
    header('Location: ../index.php');
    exit;
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
    exit;
}
header('Location: ../index.php');
