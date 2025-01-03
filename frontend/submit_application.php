<?php
session_start();

$firstNameError = isset($_SESSION['fnameValidError']) ? $_SESSION['fnameValidError'] : '';
$lastNameError = isset($_SESSION['snameValidError']) ? $_SESSION['snameValidError'] : '';
$countyError = isset($_SESSION['countyError']) ? $_SESSION['countyError'] : '';
$cityError = isset($_SESSION['cityError']) ? $_SESSION['cityError'] : '';
$universityError = isset($_SESSION['universityError']) ? $_SESSION['universityError'] : '';
$facultyError = isset($_SESSION['facultyError']) ? $_SESSION['facultyError'] : '';
$yearStudyError = isset($_SESSION['yearStudyError']) ? $_SESSION['yearStudyError'] : '';
$siblingsError = isset($_SESSION['siblingsError']) ? $_SESSION['siblingsError'] : '';
$incomeError = isset($_SESSION['incomeError']) ? $_SESSION['incomeError'] : '';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../frontend/css/forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>submit</title>
</head>
<body>
    <form id="request_place_form" method="POST" class="" action="../backend/submit_application_backend.php">
        <h1>CVsignUp</h1>
        <p class="error-message"><?php echo !empty($firstNameError) ? $firstNameError : ''; ?></p>
        <p class="error-message"><?php echo !empty($lastNameError) ? $lastNameError : ''; ?></p>
        <p class="error-message"><?php echo !empty($countyError) ? $countyError : ''; ?></p>
        <p class="error-message"><?php echo !empty($cityError) ? $cityError : ''; ?></p>
        <p class="error-message"><?php echo !empty($universityError) ? $universityError : ''; ?></p>
        <p class="error-message"><?php echo !empty($facultyError) ? $facultyError : ''; ?></p>
        <p class="error-message"><?php echo !empty($yearStudyError) ? $yearStudyError : ''; ?></p>
        <p class="error-message"><?php echo !empty($siblingsError) ? $siblingsError : ''; ?></p>
        <p class="error-message"><?php echo !empty($incomeError) ? $incomeError : ''; ?></p>

        <div class="tab">
            <p id="fnameError"></p>
            <input type="text" id="firstName" name="firstName" placeholder="first name" class="" oninput="this.className = ''" required>
            <p id="SnameError"></p>
            <input type="text" id="lastName" name="lastName" placeholder="Last name" oninput="this.className = ''" required>
        </div>
        <div class="tab">
            <p id="countyError"></p>
            <input type="text" id="county" name="county" placeholder="Judet" class="" oninput="this.className = ''" required>
            <p id="cityError"></p>
            <input type="text" id="city" name="city" placeholder="Localitate" oninput="this.className = ''" required>
        </div>
        <div class="tab">
            <p id="universityError"></p>
            <input type="text" id="university" name="university" placeholder="Universitate" class="" oninput="this.className = ''" required>
            <p id="facultyError"></p>
            <input type="text" id="faculty" name="faculty" placeholder="Faculate" oninput="this.className = ''" required>
            <p id="yearStudyError"></p>
            <input type="number" id="yearStudy" name="yearStudy" placeholder="An de studiu" oninput="this.className = ''" required>
        </div>
        <div class="tab">
        <p id="siblingsError"></p>
        <input type="number" id="siblings" name="siblings" placeholder="Frati" oninput="this.className = ''" required>
        <p id="incomeError"></p>
            <input type="number" step="0.01" id="income" name="income" placeholder="Venit pe familie" oninput="this.className = ''" required>
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
            const country = document.getElementById("county");
            const city = document.getElementById("city");
            const university = document.getElementById("university");
            const faculty = document.getElementById("faculty");
            const year_of_study = document.getElementById("yearStudy");
            const siblings = document.getElementById("siblings");
            const income = document.getElementById("income");
            const email = document.getElementById("email");

            const first_name_error = document.getElementById("fnameError");
            const last_name_error = document.getElementById("SnameError");
            const country_error = document.getElementById("countyError");
            const city_error = document.getElementById("cityError");
            const universityError = document.getElementById("universityError");
            const facultyError = document.getElementById("facultyError");
            const year_of_studyError = document.getElementById("yearStudyError");
            const siblingsError = document.getElementById("siblingsError");
            const incomeError = document.getElementById("incomeError");
            const emailError = document.getElementById("emailError");

            const form = new MultiStepForm(tabs, prevBtn, nextBtn);

            // Add event listeners
            nextBtn.addEventListener("click", () => {
                console.log("this is the current tab:" + form.currentTab);
                let isValid = true;
                switch (form.currentTab){
                    case 0:
                        if (!selector.ValidateNames(first_name.value, first_name_error)) {
                            first_name.classList.add("input_error");
                            isValid = false;
                        }
                        if (!selector.ValidateNames(last_name.value, last_name_error)) {
                            last_name.classList.add("input_error");
                            isValid = false;
                        }
                        if (isValid) {
                            form.nextPrev(1);
                        }
                        break;
                    case 1:
                        if (!selector.ValidateNames(country.value, country_error)) {
                            country.classList.add("input_error");
                            isValid = false;
                        }
                        if (!selector.ValidateNames(city.value, city_error)) {
                            city.classList.add("input_error");
                            isValid = false;
                        }
                        if (isValid) {
                            form.nextPrev(1);
                        }
                        break;
                    case 2:
                        if (!selector.ValidateNames(university.value, universityError)) {
                            university.classList.add("input_error");
                            isValid = false;
                        }
                        if (!selector.ValidateNames(faculty.value, facultyError)) {
                            faculty.classList.add("input_error");
                            isValid = false;
                        }
                        if (!selector.ValidateIntegers(year_of_study.value, year_of_studyError)) {
                            year_of_study.classList.add("input_error");
                            isValid = false;
                        }
                        if (isValid) {
                            form.nextPrev(1);
                        }
                        break;
                    case 3:
                        if (!selector.ValidateIntegers(siblings.value, siblingsError)) {
                            siblings.classList.add("input_error");
                            isValid = false;
                        }
                        if (!selector.validateFloat(income.value, incomeError)) {
                            income.classList.add("input_error");
                            isValid = false;
                        }
                        if (isValid) {
                            form.nextPrev(1);
                        }
                }

            });
            prevBtn.addEventListener("click", () => form.nextPrev(-1));
        });
    </script>
</body>

<?php

unset($_SESSION['fnameValidError']);
unset($_SESSION['snameValidError']);
unset($_SESSION['countyError']);
unset($_SESSION['cityError']);
unset($_SESSION['universityError']);
unset($_SESSION['facultyError']);
unset($_SESSION['yearStudyError']);
unset($_SESSION['siblingsError']);
unset($_SESSION['incomeError']);
exit;

?>