<?php include '../backend/php_backend/connection.php' ?>
<?php include_once '../backend/php_backend/fetch_user_data.php' ?>
<?php 
$userData = new FetchUserDataMain();
$res = $userData->fetchDataFromUsers($conn,'users','email',$_SESSION['user_email']);
$result_events = $userData->fetchDataFromUsersEvents($conn);
date_default_timezone_set('Europe/Bucharest');
$row = $res->fetch_assoc();
$today_day = date("l");
$today_hour = date("H");
$today_minute = date("i");
?>

<?php

try {
    if($result_events && $result_events->num_rows > 0){
    while($events_row = $result_events->fetch_assoc() ){
        $events_fk = $events_row['fk'];
        $data_from_users_table =$userData->fetchDataFromUsers($conn,'users','id',$events_fk);
        $data_from_users_table_row = $data_from_users_table->fetch_assoc();
        echo <<<HTML
        <link rel="stylesheet" href="../frontend/components/components_css/events.css">
        <div class="mainEvents">
            <div>
                <img src="../images/noImage.png" alt="">
                <span>
                    <p>{$data_from_users_table_row['first_name']} {$data_from_users_table_row['last_name']}</p>
                    <p>{$today_hour}h, {$today_minute} minutes ago</p>
                </span>
            </div>
            <h4>Plecare la munte</h4>
            <p>{$events_row['event_description']}</p>
            <button>Participa</button>
        </div>
        HTML;
    }
    
    }else{
        echo <<<HTML
        <link rel="stylesheet" href="../frontend/components/components_css/events.css">
        <div class = "main_no_events_div">
            <img src=".././images/purple.jpg" alt="">
            <span class = "after"></span>
            <button id = "create event_btn">Create event</button>
        </div>
        HTML;
    }
} catch (Exception $e) {
    error_log('Error: ' . $e->getMessage());
    echo "<p>An error occurred while fetching events. Please try again later.</p>";
}

?>