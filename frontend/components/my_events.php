<?php include_once '../backend/php_backend/connection.php' ?>
<?php include_once '../backend/php_backend/fetch_user_data.php' ?>
<?php

// select the data from users
$user_email = $_SESSION['user_email'];
$fetch_data_selector = new FetchUserDataMain();
$res = $fetch_data_selector->fetchDataFromUsers($conn, "users", "email",$user_email );
$row = $res->fetch_assoc();
$events_res = $fetch_data_selector->selectDataViaTableNameAndFK($conn, "users_events", "fk",$user_id );
$user_id =$row['id'];
try {
    if(!$res || $res->num_rows == 0){
        echo "no user found";
        return;
    }
    if(!$events_res || $events_res->num_rows == 0){
            echo <<<HTML
            <link rel="stylesheet" href="../frontend/components/components_css/events.css">
            <div class = "main_no_events_div">
                <img src=".././images/purple.jpg" alt="">
                <span class = "after"></span>
                <button id = "create_event_btn" class = "dark_type_button">Create event</button>
            </div>
            HTML;
        return;
    }
    while($event_row= $events_res->fetch_assoc()){
        echo <<<HTML
        <link rel="stylesheet" href="../frontend/components/components_css/my_events.css">
        <div class="main_my_event">
            <!-- <div>
                <img src="../images/noImage.jpg" alt="">
                <span>
                    <p>{$data_from_users_table_row['first_name']} {$data_from_users_table_row['last_name']}</p>
                    <p>{$today_hour}h, {$today_minute} minutes ago</p>
                </span>
            </div> -->
            <h4>Name:{$event_row['event_title']}</h4>
            <p>Description:{$event_row['event_description']}</p>
        </div>
        HTML;

        
    }

} catch (Exception $e) {
    error_log('Error: ' . $e->getMessage());
    echo "<p>An error occurred while fetching events. Please try again later.</p>";
}

?>
