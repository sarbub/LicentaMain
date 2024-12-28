<?php
session_start();
include '../backend/php_backend/Validation.php';
print_r($_SESSION);
$selector = new ValidateUsersData();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_code = $_SESSION['user_validation_code'];
    $user_entered_code = $_POST['VCode'];
    echo $user_code;
    echo "<br>";
    echo $user_entered_code;
    if(!$selector->validateIntegers($user_entered_code)){

    }else{
        echo "holla";
    }
    if($user_code && $user_code == $user_entered_code){
        echo "this is me with good news";
        print_r($_POST);
        header('Location: ../frontend/submit_application.php');
    }else{

        $_SESSION['enter_code_error'] = "the code is not correct";
        // header("Location:../frontend/enter_code.php");
    }



}

unset($_SESSION['user_validation_code']);
exit;




?>