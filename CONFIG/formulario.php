<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$name = $_POST['name'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$consulta = $_POST['consulta'];
$mensaje = $_POST['mensaje'];

//formato del correo
$formato = "Mensaje enviado por: " . $name ." " .$apellidos. " .\r\n";
$formato .="Email de contacto: " . $email . " .\r\n";
$formato .= "Telfono de contacto:" . $telefono . " .\r\n";
$formato .="Motivo de consulta:" . $consulta . " .\r\n";
$formato .="Mensaje: " .$mensaje;

$para = 'oswaldocabrejosr@gmail.com';

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
    $mail->addAddress('jeffersonalejandro943@gmail.com');     

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