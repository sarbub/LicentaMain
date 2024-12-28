<?php

echo "php file AGAIN";

include $_SERVER['DOCUMENT_ROOT'].'/licentaMain/backend/php_backend/Validation.php';
include $_SERVER['DOCUMENT_ROOT'].'/licentaMain/backend/php_backend/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new ValidateUsersData();
    print_r($_POST);
    print_r($_SESSION);
    // Validate first name
    $firstNameValid = $validator->validateNames($_POST['firstName']);
    // Validate last name
    $lastNameValid = $validator->validateNames($_POST['lastName']);
    // Validate email
    $emailValid = $validator->validateEmail($_POST['email']);
    // Validate password
    $passwordValid = $validator->validatePasswords($_POST['password']);
    $ConfirmPasswordValid = $validator->validatePasswords($_POST['password']);
    // Check if passwords match
    $passwordsMatch = $validator->checkIfPasswordsMatch($_POST['password'], $_POST['confirmPassword']);
    $checkIfEmailExists = $validator->checkIfValueExistsInDatabase('email', $_POST['email'], $conn);
    // Handle errors by setting session variables
    if (!$firstNameValid) {
        $_SESSION['firstNameError'] = "Numele nu poate fi null, si trebuie sa fie de tip text";
    }
    if (!$lastNameValid) {
        echo "the last name has an error";
        $_SESSION['lastNameError'] = "Prenumele nu poate fi null, si trebuie sa fie de tip text";
    }
    if (!$emailValid) {
        $_SESSION['CAccountEmailError'] = "Emailul nu poate fi null, si trebuie sa fie de tip text";
    }
    if (!$passwordValid) {
        $_SESSION['CAccountPasswordError'] = "Parola nu poate fi null, si trebuie sa contina cel putin 8 litere, un caracter special si o litera mare";
    }
    if (!$passwordsMatch) {
        $_SESSION['CAccountConfirmPasswordError'] = "Parolele nu corespund";
    }
    if(!$checkIfEmailExists){
        $_SESSION['EmailExistError'] = "Un alt cont cu acelasi email exista deja";
    }
    echo "this is the email:". print_r($checkIfEmailExists). "<br>";
    // Check if there are any validation errors

    if(!$checkIfEmailExists){
        header("Location: ../frontend/login.php");
        exit; // Stop further execution after redirection
    }
    if (!$firstNameValid || !$lastNameValid || !$emailValid || !$passwordValid || !$passwordsMatch ) {
        header("Location: ../frontend/signup.php");
        exit; // Stop further execution after redirection
    }


    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    $sql = "INSERT INTO users(first_name,last_name,email,user_password, account_type) VALUES(?, ?, ?, ?, 'student')";
if(!$conn){
    echo "there was a problem at the connection";
    return false;
}

    // hash passwords

    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $first_name,$last_name,$user_email,$hashed_password);
    $stmt->execute();

    $stmt->close();
    $conn->close();
    // $_SESSION['user_email'] = $_POST['email'];
    $_SESSION['user_added_succesfully'] = "User added";
    header("Location: ../frontend/login.php");



    

}
