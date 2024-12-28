<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/licenta/backend/php_backend/connection.php';
include '../backend/php_backend/Validation.php';

$validator = new ValidateUsersData();

$random_password = $validator->generateRandomString();

$user_id = $_POST['user_id'];

// select user data from pending accounts

$sql = "SELECT * FROM pending_accounts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

//save data from pending accounts to session

$_SESSION['first_name'] = $row['first_name'];
$_SESSION['last_name'] = $row['last_name'];
$_SESSION['email'] = $row['email'];
$_SESSION['random_password'] = $random_password;

// add data to database
$random_number = rand(1000, 9999);

$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];

$county = $row['county'];
$city = $row['city'];
$university = $row['university'];
$faculty = $row['faculty'];
$year_study = $row['school_year'];
$siblings = $row['siblings'];
$income = $row['income_family'];


$user_password = $random_password;
$account_type = "student";
$hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
$insertData = "INSERT INTO users(first_name, last_name, email, user_password, account_type) values(?,?,?,?,?)";
$insertDataPrepare = $conn->prepare($insertData);
$insertDataPrepare->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $account_type);
$insertDataPrepare->execute();
if ($insertDataPrepare->affected_rows > 0){
    echo "User added";
} else {
    echo "no user added";
}

// select id from the user that was created 

$selectNewUserId = "SELECT id FROM users WHERE email = ?";
$selectNewUserIdPrepare = $conn->prepare($selectNewUserId);
$selectNewUserIdPrepare->bind_param("s", $email);
$selectNewUserIdPrepare->execute();
// Get the result
$result = $selectNewUserIdPrepare->get_result();
$user_data = $result->fetch_assoc();
$userNewId = $user_data['id']; 



$insertDataIntoAditionalInformation = "INSERT INTO aditional_user_info(fk, adress_city, user_county, University, faculty, year_of_study, income) values(?,?,?,?,?,?,?)";
$insertDataPrepareAditional = $conn->prepare($insertDataIntoAditionalInformation);
$insertDataPrepareAditional->bind_param("issssid", $userNewId, $city, $county, $university, $faculty, $year_study, $income);
$insertDataPrepareAditional->execute();
if ($insertDataPrepareAditional->affected_rows > 0){
    echo "User added";
} else {
    echo "no user added";
}

// delete data from pending accounts

$deleteData = "DELETE FROM pending_accounts WHERE id = ?";
$deleteDataPrepare = $conn->prepare($deleteData);
$deleteDataPrepare->bind_param("i", $user_id);
$deleteDataPrepare->execute();

include_once '../backend/user_accepted_email_sender.php';
include_once '../frontend/components/userDemands.php';
?>
