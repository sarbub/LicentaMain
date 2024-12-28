<?php
session_start();
$emailError = isset($_SESSION['CAccountEmailError']) ? $_SESSION['CAccountEmailError'] : '';
$userExistsError = isset($_SESSION['EmailExistError']) ? $_SESSION['EmailExistError'] : '';
?>
<style>
  @import url(../frontend/css/style.css);


  .main_request_div {
    display: flex;
    width: 100vw;
    height: 100vh;
    justify-content: center;
    align-items: center;
  }

  #request_place_form {
    background-color: #ffffff;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    display: flex;
    flex-direction: column;
    width: 40%;
    gap: 10px;
    min-width: 300px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
  }

  h1 {
    position: relative;
    margin-bottom: 20px;
  }

  h3 {
    position: relative;
    margin-bottom: 10px;
    font-weight: normal;
  }

  input {
    padding: 10px;
    border-radius: 6px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }

  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    background-color: #ffdddd;
  }

  /* Hide all steps by default: */
  .tab {
    display: none;
    flex-direction: column;
    gap: 10px;
  }

  #intro_tab p {
    line-height: 20px;
    font-size: 18px !important;
    text-align: start;
  }

  .first_tab_design {
    background-color: var(--red) !important;
    color: var(--white);
  }

  .first_tab_design button {
    color: var(--red);
    background-color: var(--white);
  }

  button {
    background-color: var(--red);
    color: #ffffff;
    border-radius: 8px;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
  }

  button:hover {
    opacity: 0.8;
  }

  #prevBtn {
    background-color: #bbbbbb;
  }

  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }

  .step.active {
    opacity: 1;
  }

  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #04AA6D;
  }
</style>
<div class="main_request_div">
  <!-- <form id="request_place_form" class="" method="POST" action="../backend/validate_email.php"> -->
  <form id="request_place_form" class="" method="POST" action="../backend/verify_email_backend.php">
    <h1>CVvalidateEmail</h1>
    <!-- One "tab" for each step in the form: -->
    <p class="error-message"><?php echo !empty($emailError) ? $emailError : ''; ?></p>
    <p class="error-message"><?php echo !empty($userExistsError) ? $userExistsError : ''; ?></p>

    <div class="tab" id="intro_tab">
      <p>
        Before you can start creating an account, we need to confirm your email address. Please check your inbox for a confirmation email and follow the instructions to proceed.
      </p>
    </div>

    <div class="tab">
      <p id="emailError"></p>
      <input id="email" type="" placeholder="Enter email..." oninput="this.className = ''" name="email">
    </div>
    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" id="prevBtn" onclick="">Previous</button>
        <button type="button" id="nextBtn" onclick="">Next</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>
  </form>
</div>
<script type="module">
  document.addEventListener("DOMContentLoaded", async function() {
    const {
      MultiStepForm
    } = await import("../frontend/js/main.js");
    const {
      ValidateUserData
    } = await import("../frontend/js/validation.js");
    const selector = new ValidateUserData();
    const tabs = document.getElementsByClassName("tab");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const form = new MultiStepForm(tabs, prevBtn, nextBtn);

    const email = document.getElementById("email");
    const number = document.getElementById("number");

    const email_error = document.getElementById("emailError");
    const number_error = document.getElementById("numberError");
    prevBtn.addEventListener("click", () => form.nextPrev(-1));
    nextBtn.addEventListener("click", () => {
      console.log("this is the current tab:" + form.currentTab);
      let isValid = true;
      switch (form.currentTab){
        case 0:
          form.nextPrev(1);
          break;
        case 1:
          console.log("this is the next step or 1")
          if (selector.ValidateEmail(email.value, email_error)) {
            console.log("move on");
            form.nextPrev(1);
          } else {
            email.classList.add("input_error");

          }
          break;
        case 2:
          if (!selector.ValidateIntegers(number.value,number_error)) {
            number.classList.add("input_error");
            isValid = false;
          }
          if (isValid) {
            form.nextPrev(1);
          }
          break;
      }

    });

  });
</script>

<?php
// Clear session messages after displaying
unset($_SESSION['CAccountEmailError']);
unset($_SESSION['EmailExistError']);
?>