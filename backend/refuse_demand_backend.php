<?php
session_start();
include_once "../backend/php_backend/connection.php";
include_once "../backend/php_backend/fetch_user_data.php";
$user_id = $_POST['user_id'];
$selector = new FetchUserDataMain();
// // select data from pending accoutns

$sql = "SELECT * FROM pending_accounts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;

include_once '../backend/user_denied_email_sender.php';

if(isset($_SESSION['email_has_been_sent'])){
    echo " <ul class = 'email_sent_message'>
    <p>Email sent</p>
    <span class='material-symbols-outlined'>done_all</span>
    </ul>";
    return;
}


// delete data from pending accounts
// $deleteData = "DELETE FROM pending_accounts WHERE id = ?";
// $deleteDataPrepare = $conn->prepare($deleteData);
// $deleteDataPrepare->bind_param("i", $user_id);
// $deleteDataPrepare->execute();
include_once '../frontend/components/userDemands.php';

unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['email']);
if (isset($_SESSION['email_has_been_sent'])) {
    unset($_SESSION['email_has_been_sent']);
}

?>