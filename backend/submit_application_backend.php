<?php
session_start();
include '../backend/php_backend/Validation.php';
include '../backend/php_backend/connection.php';
require_once '../backend/send_application_via_email.php';


$selector = new ValidateUsersData();
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate inputs
    print_r($_SESSION);
    var_dump($_POST);
    $user_email = $_SESSION['user_email_from_enter_code'];
    echo $user_email;
    echo "<br>";
    $fnameValid = $selector->validateNames($_POST['firstName']);
    $snameValid = $selector->validateNames($_POST['lastName']);
    $emailValid = $selector->validateEmail($_SESSION['user_email_from_enter_code']);  // Assuming you have validateEmail() method
    $countyValid = $selector->validateNames($_POST['county']);
    $cityValid = $selector->validateNames($_POST['city']);
    $universityValid = $selector->validateNames($_POST['university']);
    $facultyValid = $selector->validateNames($_POST['faculty']);
    $yearStudyValid = $selector->validateNumbers($_POST['yearStudy']);  // Assuming validateNumbers() for numeric fields
    $siblingsValid = $selector->validateNumbers($_POST['siblings']);
    $incomeValid = $selector->validateNumbers($_POST['income']);  // Assuming you validate numbers for income

    // Check each validation result and set session errors
    if (!$fnameValid) {
        $_SESSION['fnameValidError'] = 'Numele nu poate fi null, trebuie sa fie text';
    }
    if (!$snameValid) {
        $_SESSION['snameValidError'] = 'Numele nu poate fi null, trebuie sa fie text';
    }
    if (!$emailValid) {
        $_SESSION['emailError'] = 'Email nu poate fi null, trebuie sa fie de forma name@example.com';
    }
    if (!$countyValid) {
        $_SESSION['countyError'] = 'Judetul nu poate fi null, trebuie sa fie text';
    }
    if (!$cityValid) {
        $_SESSION['cityError'] = 'Orasul nu poate fi null, trebuie sa fie text';
    }
    if (!$universityValid) {
        $_SESSION['universityError'] = 'Universitatea nu poate fi null, trebuie sa fie text';
    }
    if (!$facultyValid) {
        $_SESSION['facultyError'] = 'Facultatea nu poate fi null, trebuie sa fie text';
    }
    if (!$yearStudyValid) {
        $_SESSION['yearStudyError'] = 'Campul nu poate fi null, trebuie sa fie numar';
    }
    if (!$siblingsValid) {
        $_SESSION['siblingsError'] = 'Campul nu poate fi null, trebuie sa fie numar';
    }
    if (!$incomeValid) {
        $_SESSION['incomeError'] = 'Campul nu poate fi null, trebuie sa fie numar';
    }

    // If any validation fails, redirect with errors
    if (!$fnameValid || !$snameValid || !$emailValid || !$countyValid || !$cityValid || !$universityValid || !$facultyValid || !$yearStudyValid || !$siblingsValid || !$incomeValid) {
        header("Location: ../frontend/submit_application.php");
        exit; // Ensure the script doesn't continue after the redirect
    }
    $selector_two = new sendUserApplicationTroughEmail();

    echo 'this is me again';
    $selector_two->sendEmail($_POST['firstName'],$_POST['lastName'],$_SESSION['user_email_from_enter_code'], $_POST['county'], $_POST['city'],$_POST['university'],$_POST['faculty'],$_POST['yearStudy'],$_POST['siblings'],$_POST['income']);
    $selector_two->validate_application_sent($_SESSION['user_email_from_enter_code']);
    echo "this is me";


    $sql = "INSERT INTO pending_accounts 
    (first_name, last_name, email, county, city, university, faculty, school_year, siblings, income_family) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssssiid", 
    $_POST['firstName'], 
    $_POST['lastName'], 
    $_SESSION['user_email_from_enter_code'], 
    $_POST['county'], 
    $_POST['city'], 
    $_POST['university'], 
    $_POST['faculty'], 
    $_POST['yearStudy'], 
    $_POST['siblings'], 
    $_POST['income'],
);
echo "this is me";
// Execute the statement
if ($stmt->execute()) {

    echo "Data inserted successfully.";
    $_SESSION['application_completed'];
    header("Location: ../frontend/index.php");
exit;

} else {
    echo "Error inserting data: " . $stmt->error;
}

// Close the statement
$stmt->close();
unset($_SESSION['application_completed']);
// unset($_SESSION['user_email_from_enter_code']);
exit;



    // If all validations are successful, proceed with further processing (e.g., database insertion)
    // Example: save data to the database
    // Proceed with your logic here if everything is valid

}
?>
