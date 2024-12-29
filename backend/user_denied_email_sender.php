<?php

$user_first_name = $_SESSION['first_name'] ?? null;
$user_last_name = $_SESSION['last_name'] ?? null;
$user_email = $_SESSION['email'] ?? null;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$user_id = $_POST['user_id'] ?? null;


try {
    if (!$user_first_name || !$user_last_name || !$user_email) {
        throw new Exception("Error: User not found in session."); // Throw an exception to be caught
    }


    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  //Enable SMTP authentication
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
        <p>'.$user_first_name.' '.$user_last_name.', ne pare rau sa va informam, dar cererea de cazare in caminul Centrul Vieti a fost refuzata</p>
        <p>Cu stima, Conducerea Caminului</p>
    </div>';
    $mail->send();
    $_SESSION['email_has_been_sent'] = true;
} catch (Exception $e) {
    if ($e->getMessage() == "Error: User not found in session.") { //check if is the problem from session
        echo "Error: User data missing from the session. Cannot send email.";
    } else {
        echo "The application could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['email']);
unset($_SESSION['random_password']);

?>
