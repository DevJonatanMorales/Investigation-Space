<?php

require_once '../App/PHPMailer/class.phpmailer.php';
require_once '../App/PHPMailer/class.smtp.php';
require_once '../App/PHPMailer/PHPMailerAutoload.php';

// funcion que se encarga de enviar los correos
function enviarCorreo($name,$email,$body){
    $resultEmail = true;

    //host
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls';   
    $mail->Username = '';//coloque el correo con el que se enviaran los email
    $mail->Password = '';//coloque la contraseña del correo


    $mail->setFrom('', $name);//correo
    $mail->addAddress($email);
    $mail->addReplyTo('', 'Administrador');//correo

    $mail->isHTML(true);  
    $mail->Subject = 'Restaurar Contraseña';
    $mail->Body    = $body;

    if(!$mail->send()) {
        $resultEmail = false;
        echo 'Message could not be sent. ' . $mail->ErrorInfo;
    } 

    return $resultEmail;
}

?>
