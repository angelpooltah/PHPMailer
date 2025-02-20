<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load ruta
require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

// aqui caeran todos los posts

$asunto_contacto = 'asunto demo';
$mensaje_contacto = 'texto cuerpo del correo';

//Create an instance; passing `true` enables exceptions
// $mail->CharSet = "UTF-8";
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //cambiar a 0 para que no debuegue
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'serviciogwmmerida@grupocda.mx';                     //SMTP username
    $mail->Password   = 'FC4RY5C0631';                               //SMTP password
    $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('serviciogwmmerida@grupocda.mx', 'serviciogwmmerida@grupocda.mx');
    $mail->addAddress('ford.montejo.cda@gmail.com', 'ford.montejo.cda@gmail.com');
    // $mail->addAddress('ellen@example.com');
    // $mail->addReplyTo('serviciogwmmerida@grupocda.mx', 'serviciogwmmerida@grupocda.mx');
    // $mail->addCC('cc@example.com');
    $mail->addBCC('angel.26-pt@hotmail.com');





    //Content por html
    // $mail->isHTML(true);
    // $mail->Subject = 'Here is the subject';
    // $file = fopen("body_contacto.html", "r");
    // $str = fread($file, filesize("body_contacto.html"));
    // $str = trim($str);
    // fclose($file);
    // $mail->Body    = $str;

    //Content
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    // $mail->Subject = $asunto_contacto;
    $mail->Subject = mb_convert_encoding($asunto_contacto, "UTF-8", "auto");
    $mail->Body    = $mensaje_contacto;

    $mail->send();
    header("Location: email_success.php");
    exit;
    // echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    // echo "No se pudo enviar el mensaje. Error de envío: {$mail->ErrorInfo}";
    header('Location: email_failed.php');
    exit;
}
