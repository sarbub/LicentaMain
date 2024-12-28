<?php
// Include necessary files for connection and fetching user data
include '../backend/php_backend/connection.php';
include_once '../backend/php_backend/fetch_user_data.php';

// Initialize variables
$user_email = '';
$row = [];
$adress_city = '';

// Initialize user data object
$userData = new FetchUserDataMain();

try {
    // Retrieve user email from session
    if (!isset($_SESSION['user_email'])) {
        throw new Exception("User email not found in session.");
    }
    $user_email = $_SESSION['user_email'];

    // Fetch user data using the email
    $res = $userData->fetchDataFromUsers($conn, 'users', 'email', $user_email);
    if (!$res) {
        throw new Exception("Failed to fetch user data for email: $user_email.");
    }
    $row = $res->fetch_assoc();
    if (!$row) {
        throw new Exception("No user data found for email: $user_email.");
    }

    // Fetch additional user info using the user's ID
    $res_add_info_table = $userData->fetchDataFromUsers($conn, 'aditional_user_info', 'fk', $row['id']);
    if (!$res_add_info_table) {
        throw new Exception("Failed to fetch additional user info for user ID: {$row['id']}.");
    }

    $row_add_info_table = $res_add_info_table->fetch_assoc();
    if ($row_add_info_table && !empty($row_add_info_table['adress_city'])) {
        $adress_city = $row_add_info_table['adress_city'];
    }

} catch (Exception $e) {
    // Log the error and display a user-friendly message
    // echo "Error in myAccount.php:" . $e->getMessage();
    // echo "<p>Something went wrong. Please try again later.</p>";
}
?>

<!-- Output the HTML content dynamically -->
<?php if (!empty($row)) : ?>
    <link rel="stylesheet" href="../frontend/components/components_css/myAccountComponent.css">
    <div class="myAccountComponent">
        <img src="../images/noImage.jpg" alt="">
    </div>
<?php endif; ?>
