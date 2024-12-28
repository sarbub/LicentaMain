<?php
session_start();
$firstNameError = isset($_SESSION['firstNameError']) ? $_SESSION['firstNameError'] : '';
$lastNameError = isset($_SESSION['lastNameError']) ? $_SESSION['lastNameError'] : '';
$emailError = isset($_SESSION['CAccountEmailError']) ? $_SESSION['CAccountEmailError'] : '';
$passwordError = isset($_SESSION['CAccountPasswordError']) ? $_SESSION['CAccountPasswordError'] : '';
$confirmPasswordError = isset($_SESSION['CAccountConfirmPasswordError']) ? $_SESSION['CAccountConfirmPasswordError'] : '';
$userExistsError = isset($_SESSION['EmailExistError']) ? $_SESSION['EmailExistError'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../frontend/css/forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Create Account</title>

</head>

<body>
    <form id="request_place_form" method="POST" class="" action="../backend/signup_backend.php">
        <h1>CVsignup</h1>
        <p class="error-message"><?php echo !empty($firstNameError) ? $firstNameError : ''; ?></p>
        <p class="error-message"><?php echo !empty($lastNameError) ? $lastNameError : ''; ?></p>
        <p class="error-message"><?php echo !empty($emailError) ? $emailError : ''; ?></p>
        <p class="error-message"><?php echo !empty($userExistsError) ? $userExistsError : ''; ?></p>
        <p class="error-message"><?php echo !empty($passwordError) ? $passwordError : ''; ?></p>
        <p class="error-message"><?php echo !empty($confirmPasswordError) ? $confirmPasswordError : ''; ?></p>
        <div class="tab">
            <p id="fnameError"></p>
            <input type="text" id="firstName" name="firstName" placeholder="Nume" class="" oninput="this.className = ''" required>
            <p id="SnameError"></p>
            <input type="text" id="lastName" name="lastName" placeholder="Prenume" oninput="this.className = ''" required>
        </div>
        <div class="tab">
            <p id="emailError"></p>
            <input type="email" id="email" name="email" placeholder="Email" oninput="this.className = ''" required>
        </div>
        <div class="tab">
            <p id="passError"></p>
            <input type="password" id="password" name="password" placeholder="Parola" oninput="this.className = ''" required>
            <p id="confPassError"></p>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirma parola" oninput="this.className = ''" required>
        </div>
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="">Previous</button>
                <button type="button" id="createAccountButton">Create Account</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
    <script type="module">
        document.addEventListener("DOMContentLoaded", async function() {
            const {
                MultiStepForm
            } = await import("../frontend/js/main.js");
            const {
                ValidateUserData
            } = await import("../frontend/js/validation.js");

            // Initialize modules
            const selector = new ValidateUserData();
            const tabs = document.getElementsByClassName("tab");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("createAccountButton");
            const first_name = document.getElementById("firstName");
            const last_name = document.getElementById("lastName");
            const email = document.getElementById("email");
            const password = document.getElementById("password");
            const conf_password = document.getElementById("confirmPassword");

            const first_name_error = document.getElementById("fnameError");
            const last_name_error = document.getElementById("SnameError");
            const email_error = document.getElementById("emailError");
            const password_error = document.getElementById("passError");
            const conf_password_error = document.getElementById("confPassError");

            const form = new MultiStepForm(tabs, prevBtn, nextBtn);

            // Add event listeners
            nextBtn.addEventListener("click", () =>{
                console.log("this is the current tab:" + form.currentTab);
                let isValid = true;
                switch (form.currentTab) {
                    case 0:
                        if(!selector.ValidateNames(first_name.value, first_name_error)){
                            first_name.classList.add("input_error");
                            isValid = false;
                        }
                        if(!selector.ValidateNames(last_name.value, last_name_error)){
                            last_name.classList.add("input_error");
                            isValid = false;
                        }
                        if(isValid){
                            form.nextPrev(1);
                        }
                        break;
                    case 1:
                        console.log("this is the next step or 1")
                        if (selector.ValidateEmail(email.value, email_error)) {
                            console.log("move on");
                            form.nextPrev(1);
                        }else{
                            email.classList.add("input_error");

                        }
                        break;
                    case 2:

                        if(!selector.ValidatePasswords(password.value, password_error)){
                            password.classList.add("input_error");
                            isValid = false;
                        }
                        if(!selector.ValidatePasswords(conf_password.value, conf_password_error)){
                            conf_password.classList.add("input_error");
                            isValid = false;
                        }
                        if(!selector.CheckIfPasswordsMatch(password.value, conf_password.value, password_error)){
                            conf_password.classList.add("input_error");
                            isValid = false;
                        }
                        
                        
                        if(isValid){
                            form.nextPrev(1);
                        }
                        break;
                }

            });
            prevBtn.addEventListener("click", () => form.nextPrev(-1));
        });
    </script>

</body>

<?php
// Clear session messages after displaying
unset($_SESSION['firstNameError']);
unset($_SESSION['lastNameError']);
unset($_SESSION['CAccountEmailError']);
unset($_SESSION['CAccountPasswordError']);
unset($_SESSION['CAccountConfirmPasswordError']);
unset($_SESSION['EmailExistError']);
?>

</html>