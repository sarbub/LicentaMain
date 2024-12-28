<?php
session_start();


include $_SERVER['DOCUMENT_ROOT'].'/backend/php_backend/connection.php';
include_once '../backend/php_backend/Validation.php';
include_once '../backend/php_backend/fetch_user_data.php';


$selector = new ValidateUsersData();
$fetchSelector = new FetchUserDataMain();

print_r($_POST);

if(!$selector->validatePostContent(($_POST['user_post']))){
    $_SESSION['post_error'] = "Post cant be empty";
    header("Location: ../frontend/account.php");
    return;
}



date_default_timezone_set('Europe/Bucharest');
$currentDateTime = date('Y-m-d H:i:s');
$user_email = $_SESSION['user_email'];

$data = $fetchSelector->fetchDataFromUsers($conn,'users', 'email', $user_email);
$row = $data->fetch_assoc();
$user_id = $row['id'];


echo "this is the user id -> ".$user_id."<-";




$sql = "INSERT INTO users_posts(fk, WOnYourMind, currentDate) values (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss",$user_id, $_POST['user_post'], $currentDateTime);
$stmt->execute();

header('Location: ../frontend/account.php');
?>