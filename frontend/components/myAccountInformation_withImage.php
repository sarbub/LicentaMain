<?php include '../backend/php_backend/connection.php' ?>
<?php include_once '../backend/php_backend/fetch_user_data.php' ?>
<?php
$userData = new FetchUserDataMain();
$user_email = $_SESSION['user_email'] ? $_SESSION['user_email'] : "";
$res = $userData->fetchDataFromUsers($conn, 'users', 'email', $user_email);
$row = $res->fetch_assoc();
?>
<?php
$user_posts_number = $userData->CountUserData($conn, $row['id']);

try {
    $statusClass = '';

switch ($row['account_type']) {
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

    echo <<<HTML
<link rel="stylesheet" href="../frontend/components/components_css/myAccountInformation_withImage.css">
<div class="mainAccountInformationDiv">
    <span class="after"></span>
    <img id = "mainAccountBackgroundImage" src="../images/abstract.jpg" alt="">
    <div class="image_verified_div">
        <img id = "mainAccountImage" src="../images/noImage.jpg" alt="">
        <span id = "myStatusStar" class="material-symbols-outlined $statusClass">
            verified
        </span>
    </div>
    <div class="types_of_accounts">
    <span class="material-symbols-outlined" title = "Conducerea">
            verified
        </span>
        <span class="material-symbols-outlined" title = "Staff">
            verified
        </span>
        <span class="material-symbols-outlined" title = "Student">
            verified
        </span>
    </div>
   <div class="info">
    <h1>{$row['first_name']} {$row['last_name']}</h1>
        <p id = "user_email">{$row['email']}</p>
        <div class="aditionalInfo">
        <p id="myChoresNumber">0 chores</p>
        <p id="myPosts">{$user_posts_number} posts</p>
   </div>

</div>
    <div class="buttons_span">
        <button class = "dark_transition" id="edit_profile_form_btn">Edit profile</button>
        <button id="add_elements">+</button>
    </div>
</div>
HTML;
} catch (Exception $e) {
    echo $e;
}
?>

