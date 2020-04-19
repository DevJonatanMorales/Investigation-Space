<?php
function enciarCorreo($asunto,$correo,$body){
    require_once '../App/PHPMailer/class.phpmailer.php';
    require_once '../App/PHPMailer/class.smtp.php';

    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    /* coloca la direccion de tu correo  en la comillas simples*/
    $mail->varU = 'InvetigationSpace@gmail.com';
    /* coloca la contraseña de tu correo  en la comillas simples*/
    $mail->varP = '75762178';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    /* coloca la direccion de tu correo en la comillas simples */
    $mail->setFrom('InvetigationSpace@gmail.com', 'Investigation-Space');
    $mail->addAddress($correo);

    $mail->isHTML(true);

    $mail->Subject = $asunto;
    $mail->Body    = $body;

    if(!$mail->send()) {
        echo 'Error al enviar correo';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

?>
