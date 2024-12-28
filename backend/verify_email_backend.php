<?php
session_start();
include '../backend/php_backend/Validation.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$user_email = $_POST['email'];
$_SESSION['user_email'] = $user_email;



// $user_email = $_POST[''];
$mail = new PHPMailer(true);

$selector = new ValidateUsersData();
$random_number = $selector->generateSixDigitRandomNumber();

if ($user_email){
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
        $mail->Port       = 587;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('sarbub5@gmail.com', 'CVSupport-team');
        $mail->addAddress($user_email, 'User');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Centrul vietii - FirePage';
        $mail->Body = '
    <div style="background-color: white; border-radius: 10px; display: block; text-align: center; justify-content: center; align-items: center;">
        <h3 style="font-size: 20px;">Please do not reply</h3>
        <h4 style="font-size: 18px;">The confirmation code is:</h4>
        <h4 id="confirmation_code" style="color: green; font-size: 40px;">' . $random_number . '</h4>
    </div>';



        $mail->send();
        echo 'Message has been sent';
        echo "happy again";
        $_SESSION['user_validation_code'] = $random_number;
        $_SESSION['user_email_from_enter_code'] = $_POST['email'];
        header('Location: ../frontend/enter_code.php');
        print_r($_SESSION);
        unset($_SESSION['user_email']);
        exit();  // Always call exit() after a header redirect to stop further execution.

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    $_SESSION['send_email_section_error'] = 'There was an error in the send email part';
}


?>
