<?php 
include '../backend/php_backend/connection.php';
include_once '../backend/php_backend/fetch_user_data.php'; 
try {
    $userData = new FetchUserDataMain();
    $user_email = $_SESSION['user_email'];

    // Fetch user data
    $res = $userData->fetchDataFromUsers($conn,'users','email', $user_email);
    if ($res === null) {
        throw new Exception('User data is null.');
    }

    $row = $res->fetch_assoc();
    if ($row === null) {
        throw new Exception('No data found for the user.');
    }

    $user_id = $row['id'];

    // Fetch user tasks data
    $UserTasksRes = $userData->fetchDataFromUsersByTable($conn, 'users_tasks');
    if ($UserTasksRes === null) {
        throw new Exception('User tasks data is null.');
    }

    $tasks_rows = $UserTasksRes->fetch_assoc();
    if ($tasks_rows === null) {
        throw new Exception('No tasks found for the user.');
    }

} catch (Exception $e) {
    // Log the error or handle accordingly (e.g., move on, show a message)
    error_log('Error: ' . $e->getMessage());
}

$given_to = isset($tasks_rows['given_to']) ? $tasks_rows['given_to'] : 'No one assigned';
$today = isset($tasks_rows['today']) ? $tasks_rows['today'] : ' - ';

echo <<<HTML
    <link rel="stylesheet" href="../frontend/components/components_css/myAccountPlace.css">
    <div class="myAccountPlaceComponent">
        <img src="../images/stats.jpg" class = "background_image" alt="">
        <span class = "after"></span>
        <!-- <div class="user_nameDate">
            <p id="myName"> 
                $given_to
            </p>
            <p id="post_date">
                $today
            </p>
        </div> -->
        <div class="user_info">
            <h3>Statistics</h3>
        </div>
    </div>
    <div class="names_of_assigned">
    <p id="myName">No statistics available</p>
    </div>

HTML;


?>


