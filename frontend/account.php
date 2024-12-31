<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../frontend//css/account.css">
    <link rel="stylesheet" href="../frontend//css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    <?php include "../frontend/components/addPostOverFile.php" ?>
    <?php include "../frontend/components/addEventOverFile.php" ?>
    <?php include "../frontend/components/editProfile.php" ?>
    <div class="navigation">
        <a href="../frontend/account.php" id="home_logo_link">FirePage</a>
        <div class="">
        <?php include '../frontend/components/myAccount.php' ?>
        </div>
    </div>
    <div class="mainSection">
        <div class="more">
        <h2>Sarcini</h2>
            <div class="sarcini">
            <?php include './components/myAccountPlace.php'?>
            </div>
            <h2 id="stats_h2">Statistici</h2>
            <div class="statistics">
            <?php include './components/stats.php'?>
            </div>
        </div>
        <div class="main_center">
            <div class="main_center_profile_bar">
                <ul>
                    <li><p id="scroll_to_top_main_center">FirePage</p></li>
                    <li><?php include '../frontend/components/myAccount.php' ?></li>
                </ul>
            </div>
            <div class="myAccountProfile">
            <?php include './components/myAccountInformation_withImage.php' ?>
            </div>
            <div class="add_post_event">
                <button id="add_post_show_btn" class="dark_radius_type_button" >add post</button>
                <button id="add_event_show_btn" class = "dark_type_rev_button">add event</button>
            </div>
            <div class="navigation_post_demands">
                <ul>
                    <li id="posts_active" class="active dark_radius_type_button">Postari</li>
                    <li id="demands_active" class = "dark_radius_type_button">Cereri</li>
                </ul>
            </div>
            <div class="loader_container">
                    <div class="loader"></div>
            </div>
            <div class="demands">
                    <?php include './components/userDemands.php' ?>  
            </div>
            <div class="userPosts">
                <?php include './components/usersPosts.php'?>
            </div>
        </div>
        <div class="events">
            <div class="events_navigation">
                <ul>
                    <li class="dark_type_rev_button events_navigation_element">Eventimente</li>
                    <li class="dark_radius_type_button my_events_navigation_element">Ev.mele</li>
                </ul>
            </div>
            <div class="eventsList">
            <div class="events_div">
                <?php include './components/events.php'?>
            </div>
            <div class="my_events_div">
            <?php include './components/my_events.php'?>
            </div>
            </div>
        </div>
    </div>
    <script type="module" src="../frontend/js/account.js?v=1.0"></script>
</body>

</html>