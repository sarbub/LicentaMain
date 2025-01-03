<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../frontend/css/login.css">
    <link rel="stylesheet" href="../frontend/css/classes.css">
</head>
<body>
    <div class="main_section">
    <svg class="svgTop" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="#D9D9D9" fill-opacity="1" d="M0,192L0,128L120,128L120,160L240,160L240,320L360,320L360,192L480,192L480,288L600,288L600,160L720,160L720,224L840,224L840,256L960,256L960,256L1080,256L1080,160L1200,160L1200,320L1320,320L1320,64L1440,64L1440,0L1320,0L1320,0L1200,0L1200,0L1080,0L1080,0L960,0L960,0L840,0L840,0L720,0L720,0L600,0L600,0L480,0L480,0L360,0L360,0L240,0L240,0L120,0L120,0L0,0L0,0Z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" class="svgBottom" viewBox="0 0 1440 320" preserveAspectRatio="none">
    <image xlink:href="../images/timisoara" width="100%" height="100%" preserveAspectRatio="none"></image>
    <path fill="#D9D9D9" fill-opacity="1" d="M0,288L0,64L120,64L120,64L240,64L240,160L360,160L360,64L480,64L480,192L600,192L600,32L720,32L720,32L840,32L840,192L960,192L960,128L1080,128L1080,32L1200,32L1200,64L1320,64L1320,96L1440,96L1440,320L1320,320L1320,320L1200,320L1200,320L1080,320L1080,320L960,320L960,320L840,320L840,320L720,320L720,320L600,320L600,320L480,320L480,320L360,320L360,320L240,320L240,320L120,320L120,320L0,320L0,320Z"></path></svg>
        <div class="login_section">
            <p id="IndexaditionalText" class="error-message"><?php echo !empty($IndexaditionalText) ? $IndexaditionalText : ''; ?></p>
            <form id="loginForm" method="POST" action="../backend/login_backend.php">
                <p><?php echo isset($_SESSION['EmailExistError']) ? $_SESSION['EmailExistError'] : '' ?></p>
            <?php
                if (isset($_SESSION['IndexaditionalText']) && $_SESSION['IndexaditionalText']) {
                    echo "<p class='error-message'>".$_SESSION['IndexaditionalText']."</p>";
                    $_SESSION['IndexaditionalText'] = '';  // Reset the session variable
                }
            ?>

                <!-- Email Field -->
                <div>
                    <input type="email" id="email" name="email" placeholder="Email" required >
                    <p id="emailError" class="error-message"><?php echo !empty($emailError) ? $emailError : ''; ?></p>
                </div>

                <!-- Password Field -->
                <div>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <p id="passwordError" class="error-message"><?php echo !empty($passwordError) ? $passwordError : ''; ?></p>
                </div>

                <button type="submit" id="loginButton" class="dark_radius_rev_type_button">Login</button>
                <div class="">
                    <p id="dont_haveAccount_p">Don't have an account? <a href="./verify_email.php">Create account</a></p>
                </div>
            </form>
           </div>
           <div class="text_section">
                <h1>Bine ai revenit!</h1>
                <p>
                Bine ai revenit, este grozav să te am din nou aici. Conectați-vă pentru a continua
                </p>
           </div>  
    </div>

    <script type="module" src="../frontend/js/login.js"></script>
</body>
<?php 
unset($_SESSION['EmailExistError']);

?>
</html>