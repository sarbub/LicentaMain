<?php

echo "php file AGAIN";

include $_SERVER['DOCUMENT_ROOT'].'/Centrul vietii/backend/php_backend/Validation.php';
include $_SERVER['DOCUMENT_ROOT'].'/Centrul Vietii/backend/php_backend/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new ValidateUsersData();
    print_r($_POST);
    print_r($_SESSION);
    // Validate email
    $emailValid = $validator->validateEmail($_POST['email']);
    $checkIfEmailExists = $validator->checkIfValueExistsInDatabase('email', $_POST['email'], $conn);
    // Handle errors by setting session variables
    if (!$emailValid){
        $_SESSION['CAccountEmailError'] = "Emailul nu poate fi null, si trebuie sa fie de tip text";
    }
    if(!$checkIfEmailExists){
        $_SESSION['EmailExistError'] = "Un alt cont cu acelasi user exista deja";
    }
    echo "this is the email:". print_r($checkIfEmailExists). "<br>";
    // Check if there are any validation errors
    if ( !$emailValid ||!$checkIfEmailExists) {
        header("Location: ../frontend/verify_email.php");
        print_r($_SESSION);
        exit; // Stop further execution after redirection
    }
    header("Location: ../frontend/signup.php");

}
