<?php
// include '../backend/php_backend/Validation.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


class sendUserApplicationTroughEmail
{
    public function sendEmail($user_first_name,$user_last_name, $user_email, $user_county,$user_city,$user_university,$user_faculty, $user_school_year, $user_siblings, $user_income)
    {
        // $user_email = $_POST[''];
        $mail = new PHPMailer(true);

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
                $mail->setFrom($user_email, 'User');
                $mail->addAddress('sarbub5@gmail.com', 'CVSupport-team');     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Centrul vietii - FirePage';
                $mail->Body = '
                <div style="background-color: white; border-radius: 10px; display: block; justify-content: center; align-items: center;">
                    <h1>Cerere cazare</h1>
                    <p>Subsemnatul/a,'.$user_first_name.' '. $user_last_name.', vă adresez această cerere în vederea obținerii unui loc de cazare.</p>
                    <p>Vă prezint mai jos datele mele personale și informațiile relevante pentru evaluarea cererii:</p>
                    <p>Numele complet:'.$user_first_name.' '.$user_last_name.'</p>
                    <p>Email:'.$user_email.'</p>
                    <p>Județ:'.$user_county.'</p>
                    <p>Oraș:'.$user_city.'</p>
                    <p>Universitate:'.$user_university.'</p>
                    <p>Facultate:'.$user_faculty.'</p>
                    <p>An de studiu:'.$user_school_year.'</p>
                    <p>Număr frați/surori:'.$user_siblings.'</p>
                    <p>Venit lunar pe familie:'.$user_income.'</p>
                    <p>Prin prezenta, declar că datele furnizate sunt complete și corecte și mă angajez să respect toate condițiile impuse de instituția dumneavoastră pentru obținerea cazării. Vă rog să analizați cererea mea și să îmi comunicați decizia dumneavoastră în cel mai scurt timp posibil.</p>
                    <p>Vă mulțumesc anticipat pentru timpul și atenția acordate!</p>
                    <p>Cu stimă,</p>
                    <p>'.$user_first_name.' '.$user_last_name.'</p>
                </div>';
                $mail->send();
                echo 'Message has been sent';  // Always call exit() after a header redirect to stop further execution.

            } catch (Exception $e) {
                echo "The aplication could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }

   public function validate_application_sent($user_email){
            // $user_email = $_POST[''];
            $mail = new PHPMailer(true);

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
                $mail->setFrom('sarbub5@gmail.com', 'CVSupport-team');
                $mail->addAddress($user_email, 'User');     //Add a recipient
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Centrul vietii - FirePage';
                $mail->Body = '
                <div style="background-color: white; border-radius: 10px; display: block; justify-content: center; align-items: center;">
                    <h1>Cerere cazare</h1>
                    <h2>Cererea de cazare a fost trimisă pentru evaluare, vom reveni cu un raspuns in urmatoarele zile</h2>
                    <h2>Multumim ca ai ales sa faci parte din Centrul Vietii</h2>
                    <h3>FirePage Support Team</h3>
                    </div>';
                $mail->send();
                echo 'Message has been sent';  // Always call exit() after a header redirect to stop further execution.

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
   }

   public function send_confirm_demand_email($user_email){
    $mail = new PHPMailer(true);

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
        $mail->setFrom('sarbub5@gmail.com', 'CVSupport-team');
        $mail->addAddress($user_email, 'User');     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Centrul vietii - FirePage';
        $mail->Body = '
        <div style="background-color: white; border-radius: 10px; display: block; justify-content: center; align-items: center;">
            <h1>Cerere cazare</h1>
            <p>Dorim ca prin acest mail sa va anuntam ca cererea de cazare la caminul Centrul Vietii a fost acceptata</p>
            <p>Multumim ca ati ales sa faceti parte din Centrul Vietii</p>
            <p>FirePage Support Team</p>
            </div>';
        $mail->send();
        echo 'Message has been sent';  // Always call exit() after a header redirect to stop further execution.

    } catch (Exception $e) {
        echo "The application could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

   }
}


    



//Create an instance; passing `true` enables exceptions
