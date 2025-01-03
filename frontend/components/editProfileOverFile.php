<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=close" />
<link rel="stylesheet" href="../frontend/components/components_css/editProfileOverFile.css">

<?php
include_once '../backend/php_backend/connection.php';
include_once '../backend/php_backend/Validation.php';
include_once '../backend/php_backend/fetch_user_data.php';


$selector = new ValidateUsersData();
$fetchSelector = new FetchUserDataMain();

$user_email = $_SESSION['user_email'];
$users_data = $fetchSelector->fetchDataFromUsers($conn,'users', 'email', $user_email);
$users_row = $users_data->fetch_assoc();
$user_id = $users_row['id'];

$aditional_info_data = $fetchSelector->fetchDataFromUsers($conn,'aditional_user_info', 'fk', $user_id);
$aditional_info_row = $aditional_info_data->fetch_assoc();
?>
<!-- fetch the data form database -->


<div class="mainOverFileEditProfile">
    <div class="insideMainProfileEdit">
        <span class="material-symbols-outlined round_button" id="edit_profile_close_btn">
            close
        </span>
        <div class="myInforamtion">
        <ul>
    <li>
        <span><?php echo "First name: {$users_row['first_name']}"; ?></span>
        <span class="material-symbols-outlined ">
            id_card
        </span>
    </li>
    <li>
        <span><?php echo "Last name: {$users_row['last_name']}"; ?></span>
        <span class="material-symbols-outlined ">
        id_card
        </span>
    </li>
    <li>
        <span><?php echo "Email: {$users_row['email']}"; ?></span>
        <span class="material-symbols-outlined ">
            mail
        </span>
    </li>
    <li>
        <span><?php echo "County: {$aditional_info_row['user_county']}"; ?></span>
        <span class="material-symbols-outlined ">
            map
        </span>
    </li>
    <li>
        <span><?php echo "City: {$aditional_info_row['adress_city']}"; ?></span>
        <span class="material-symbols-outlined ">
        location_on
        </span>
    </li>
    <li>
        <span><?php echo "University: {$aditional_info_row['University']}"; ?></span>
        <span class="material-symbols-outlined ">
            school
        </span>
    </li>
    <li>
        <span><?php echo "Faculty: {$aditional_info_row['faculty']}"; ?></span>
        <span class="material-symbols-outlined">
        school
        </span>
    </li>
    <li id="edit_profile_btn_li">
        <p id="edit_profile_btn" class="dark_type_button">edit</p>
    </li>
</ul>
        </div>
    </div>
</div>