<?php include_once '../backend/php_backend/connection.php' ?>
<?php include_once '../backend/php_backend/fetch_user_data.php' ?>
<?php
// select the data from users
$user_id = $_SESSION['user_email'];
$fetch_data_selector = new FetchUserDataMain();
$res = $fetch_data_selector->fetchDataFromUsers($conn, "users", "email",$user_id );
$row = $res->fetch_assoc();

$events_res = $fetch_data_selector->selectDataViaTableNameAndFK($conn, "users_events", "fk",$user_id );

$user_id = "this is the user id".$row['id'];
try {
    if(!$res && !$res->num_rows >0){
        echo "no user found";
        return;
    }

    while($events_res && $events_res->num_rows > 0){
        
    }
} catch (Exception $e) {
    error_log('Error: ' . $e->getMessage());
    echo "<p>An error occurred while fetching events. Please try again later.</p>";
}

?>
