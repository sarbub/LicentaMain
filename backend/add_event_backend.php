<?php
session_start();


include $_SERVER['DOCUMENT_ROOT'].'/Centrul vietii/backend/php_backend/connection.php';
include_once '../backend/php_backend/Validation.php';
include_once '../backend/php_backend/fetch_user_data.php';


$selector = new ValidateUsersData();
$fetchSelector = new FetchUserDataMain();



$event_name = $_POST['event_name'];
$event_date = $_POST['event_date'];
$event_description = $_POST['Event_description'];


if(!$selector->validatePostContent(($_POST['user_post']))){
    $_SESSION['event_error'] = "Post cant be empty";
    header("Location: ../frontend/account.php");
    return;
}

?>