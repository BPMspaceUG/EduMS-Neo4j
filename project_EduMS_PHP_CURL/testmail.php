<?php
    require("/project/vendor/phpmailer/phpmailer/src/PHPMailer.php");
    require("/project/vendor/phpmailer/phpmailer/src/SMTP.php");
    require("/project/vendor/phpmailer/phpmailer/src/Exception.php");

 $mail = new PHPMailer();

// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "EduMSMailhog"; // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = false;                  // enable SMTP authentication
$mail->Port       = 1025;                    // set the SMTP port for the GMAIL server
$mail->Username   = "username"; // SMTP account username example
$mail->Password   = "password";        // SMTP account password example

// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'This is a Testmail';
$mail->Body    = 'send from <solid>'.gethostname().'</solid> at '. date('Y-m-d').".</br>";
$mail->AltBody = 'send from '.gethostname().'at '. date('Y-m-d').".\n";

$mail->send();