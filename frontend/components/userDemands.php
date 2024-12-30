<?php
include '../backend/php_backend/connection.php';
include_once '../backend/php_backend/fetch_user_data.php';

try {
    $userData = new FetchUserDataMain();
    $res = $userData->fetchDataFromUsersByTableRev($conn, 'pending_accounts');

    echo '<link rel="stylesheet" href="../frontend/components/components_css/userDemands.css">';
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=expand_content" />';
    if ($res && $res->num_rows > 0) {
        // Loop through each post row
        $num_row = 1;
        while ($row = $res->fetch_assoc()){
            echo <<<HTML
            <div class="main_demands_div">
    <div class="first_div">
        <div class="span_div">
            <p class="row_number">$num_row</p>
            <div class="num_rows_first_second_namd_div">
                <h4>{$row['first_name']} {$row['last_name']}</h4>
                <h6>{$row['county']}</h6>
            </div> <!-- Closing tag for num_rows_first_second_namd_div -->
        </div> <!-- Closing tag for span_div -->
        <button class="expand_content"><span class=" my_open_close_icon material-symbols-outlined">add</span></button>
    </div> <!-- Closing tag for first_div -->
    <div class="hide_show_demands_div">
        <div class="second_div">
            <p>Subsemnatul/a, <span>{$row['first_name']}</span> <span>{$row['last_name']}</span>, vă adresez această cerere în vederea obținerii unui loc de cazare. Vă prezint mai jos datele mele personale și informațiile relevante pentru evaluarea cererii:</p>
            <p>Numele complet: <span>{$row['first_name']}</span> <span>{$row['last_name']}</span></p>
            <p>Email: <span>{$row['email']}</span></p>
            <p>Județ: <span>{$row['county']}</span></p>
            <p>Localitate: <span>{$row['city']}</span></p>
            <p>Universitatea: <span>{$row['university']}</span></p>
            <p>Facultatea: <span>{$row['faculty']}</span></p>
            <p>An de studiu: <span>{$row['school_year']}</span></p>
            <p>Frați/Surori: <span>{$row['siblings']}</span></p>
            <p>Venit lunar pe familie: <span>{$row['income_family']}</span></p>
            <p>Prin prezenta, declar că datele furnizate sunt complete și corecte și mă angajez să respect toate condițiile impuse de instituția dumneavoastră pentru obținerea cazării. Vă rog să analizați cererea mea și să îmi comunicați decizia dumneavoastră în cel mai scurt timp posibil.</p>
            <p>Vă mulțumesc anticipat pentru timpul și atenția acordate!</p>
            <p>Cu stimă, <span>{$row['first_name']}</span> <span>{$row['last_name']}</span></p>
        </div> <!-- Closing tag for second_div -->
        <div class="third_section">
            <button data-id = "{$row['id']}" class="accept_btn dark_radius_type_button">Acceptă</button>
            <button data-id = "{$row['id']}" class="decline_btn dark_type_rev_button">Refuză</button>
        </div> <!-- Closing tag for third_section -->
    </div> <!-- Closing tag for hide_show_demands_div -->
</div> <!-- Closing tag for main_demands_div -->

HTML;
            $num_row++;
        }
    } else {
        // No posts available, display a message
        echo 'no demands';
    }
} catch (Exception $e) {
    error_log('Error: ' . $e->getMessage());
    echo "<p>An error occurred while fetching posts. Please try again later.</p>";
}
