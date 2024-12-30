<?php

$user_first_name = $_SESSION['first_name'];
$user_last_name = $_SESSION['last_name'];
$user_email = $_SESSION['email'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once  '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$user_id = $_POST['user_id'];
$randomNumber = rand(1, 10);
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    //Enable SMTP authentication
    $mail->Username   = 'sarbub5@gmail.com';                     //SMTP username
    $mail->Password   = 'njpt phvr evko ypmt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("bogdan.sarbu02@e-uvt.ro", 'User');
    $mail->addAddress($user_email, 'CVSupport-team');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Centrul vietii - FirePage';
    $mail->Body = '
    <div style="background-color: white; border-radius: 10px; display: block; justify-content: center; align-items: center;">
        <h1>Raspuns cerere cazare</h1>
        <p>'.$user_first_name.' '.$user_last_name.', cererea de cazare in caminul studentesc Centrul Vietii a fost acceptata</p>
        <p>Pentru a te conecta la contul dvs, va rugam sa folositi emailul de pe care ati facut cererea 
        si parola: '.$_SESSION['random_password'].'</p>
    </div>';
    $mail->send();
    $_SESSION['email_has_been_sent'] = true;// Always call exit() after a header redirect to stop further execution.
} catch (Exception $e) {
    echo "The aplication could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['email']);
unset($_SESSION['random_password']);


?>