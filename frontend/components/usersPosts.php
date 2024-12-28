<?php
include '../backend/php_backend/connection.php';
include_once '../backend/php_backend/fetch_user_data.php';

try {
    $userData = new FetchUserDataMain();
    $res = $userData->fetchDataFromUsers($conn, 'users', 'email', $_SESSION['user_email']);
    $postsResult = $userData->fetchDataFromUsersPosts($conn);

    date_default_timezone_set('Europe/Bucharest');
    $row = $res->fetch_assoc(); // Fetch user data



    if ($postsResult && $postsResult->num_rows > 0) {
        // Loop through each post row
        while ($posts_row = $postsResult->fetch_assoc()){
            $user_post_fk = $posts_row['fk'];
            $userNameForPost = $userData->fetchDataFromUsers($conn, 'users', 'id', $user_post_fk);
            $result = $userNameForPost->fetch_assoc();
            $statusClass = '';

            switch ($result['account_type']) {
                case 'student':
                    $statusClass = 'blue_star';
                    break;
                case 'staff':
                    $statusClass = 'yellow_star';
                    break;
                case 'conducere':
                    $statusClass = 'red_star';
                    break;
                default:
                    $statusClass = 'blue_star';
                    break;
                }

            $formattedDate = date("d•m•Y", strtotime($posts_row['currentDate']));
            echo <<<HTML
<link rel="stylesheet" href="../frontend/components/components_css/userPost.css">
<div class="mainPostDiv">
    <div class="">
        <span>
            <img src="../images/noImage.png" alt="">
            <div id = "inside_post_user_info">
                <p>{$result['first_name']} {$result['last_name']}</p>
                <div>
                <span class="material-symbols-outlined" id = "public_icon">
            public
        </span>
                    <p id = "user_post_date">{$formattedDate}</p>
                </div>
            </div>
        </span>
        <span class="material-symbols-outlined $statusClass">
                    verified
                    </span>
    </div>
    <p>{$posts_row['WOnYourMind']}</p>
</div>
HTML;
        }
    } else {
        // No posts available, display a message
        echo "<p>No posts available at the moment</p>";
    }
} catch (Exception $e) {
    error_log('Error: ' . $e->getMessage());
    echo "<p>An error occurred while fetching posts. Please try again later.</p>";
}
