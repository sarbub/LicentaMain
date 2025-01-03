<?php
session_start();


include $_SERVER['DOCUMENT_ROOT'].'/backend/php_backend/connection.php';
include_once '../backend/php_backend/Validation.php';
include_once '../backend/php_backend/fetch_user_data.php';
$selector = new ValidateUsersData();
$fetchSelector = new FetchUserDataMain();

$event_name = $_POST['event_name'];
$event_date = $_POST['event_date'];
$event_description = $_POST['Event_description'];
$_SESSION['event_error'] = '';

if(!$selector->validateNames($event_name)){
    $_SESSION['event_error'] = "Please verify your event name";
    header("Location:../../frontend/account.php");
    return;
}
if(!$selector->validatePostContent($event_description)){
    $_SESSION['event_error'] = "Please verify your event description";
    header("Location:../../frontend/account.php");
    return;
}
if(!$selector->validateDate($event_date)){
    $_SESSION['event_error'] = "Please verify your date";
    header("Location:../../frontend/account.php");
    return;
}

$user_email = $_SESSION['user_email'];
print_r($_POST);
$data = $fetchSelector->fetchDataFromUsers($conn,'users', 'email', $user_email);
$row = $data->fetch_assoc();
$user_id = $row['id'];
// add event to database

$sql = "INSERT INTO users_events(fk, event_title,event_description, event_date) values (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss",$user_id, $_POST['event_name'], $_POST['Event_description'], $_POST['event_date']);
$stmt->execute();

header("Location:../../frontend/account.php");











?>