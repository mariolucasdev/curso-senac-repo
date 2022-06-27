<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'config.php';

$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP();  //Send using SMTP
    $mail->Host       = HOST;     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;     //Enable SMTP authentication
    $mail->Username   = EMAIL;    //SMTP username
    $mail->Password   = PASSWORD; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(EMAIL);
    $mail->addAddress(TO);   //Add a recipient
    $mail->addReplyTo(EMAIL);
    
    if(CC):
        $mail->addCC(CC);
    endif;

    if(BCC):
        $mail->addBCC(BCC);
    endif;
    
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    
    if(ATTACH):
        $mail->addAttachment(ATTACH);    //Optional name
    endif;

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Aula PHPMailer com Anexo';
    $mail->Body    = '<h1>PHPMailer Running!</b>';
    $mail->AltBody = 'Messagen Plain';

    $mail->send();

    echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    echo "Falha ao enviar e-mail! Erro: {$mail->ErrorInfo}";
}