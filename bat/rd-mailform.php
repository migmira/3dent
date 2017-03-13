<?php

try {
    require './phpmailer/PHPMailerAutoload.php';


    if (preg_match('/^(127\.|192\.168\.)/', $_SERVER['REMOTE_ADDR'])) {
        die('MF002');
    }

    $field_name = $_POST['name'];
    $field_lastname = $_POST['lastname'];
    $field_email = $_POST['email'];
    $field_message = $_POST['message'];
    $field_phone = $_POST['phone'];

    $body = 'Nuevo Mensaje de Contacto<br><br>'
    .'<strong> Nombre:       '. $field_name . ' ' . $field_lastname. '</strong>' 
    .'<br> Email:            '. $field_email  
    .'<br> Celular:          '. $field_phone 
    .'<br> Mensaje:          '. $field_message;


    $mail = new PHPMailer();
    $mail->From = 'contacto@3dent.mx';
    $mail->FromName = 'Contacto 3dent Website';

    $mail->addAddress('contacto@3dent.mx');
    $mail->addAddress('3dentmax@gmail.com');
    $mail->addAddress('migmira@hotmail.com');

    $mail->CharSet = 'utf-8';
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $mail->send();

    die('MF000');
} catch (phpmailerException $e) {
    die('MF254');
} catch (Exception $e) {
    die('MF255');
}