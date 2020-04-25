<?php

require_once '../App/PHPMailer/Exception.php';
require_once '../App/PHPMailer/PHPMailer.php';
require_once '../App/PHPMailer/SMTP.php';

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
    $mail->Username = 'invetigationspace@gmail.com';
    $mail->Password = '75762178';  


    $mail->setFrom('invetigationspace@gmail.com', $name);
    $mail->addAddress($email);
    $mail->addReplyTo('invetigationspace@gmail.com', 'Administrador');

    $mail->isHTML(true);  
    $mail->Subject = 'Restaurar contraseña';
    $mail->Body    = $body;

    if(!$mail->send()) {
        $resultEmail = false;
        echo 'Message could not be sent. ' . $mail->ErrorInfo;
    } 

    return $resultEmail;
}

?>
