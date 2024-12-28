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

  /* resend_code */

  #resend_code{
    cursor: pointer;
    padding: 10px 20px;
    color: var(--white);
    background-color: var(--real_red);
    border:none;
    border-radius: 10px;
    border:2px solid var(--real_red);
    transition: all 0.5s ease;
    width: 160px;
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
  }
  #resend_code:hover{
    color: var(--real_red);
    background-color: var(--white);
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
  <form id="request_place_form" class="" method="POST" action="../backend/enter_code_backend.php">
    <h1>CVvalidateEmail</h1>
    <p><?php echo isset($_SESSION['enter_code_error']) ? $_SESSION['enter_code_error'] : ''; ?></p>
    <!-- One "tab" for each step in the form: -->
    <p class="error-message"><?php echo !empty($emailError) ? $emailError : ''; ?></p>
    <p class="error-message"><?php echo !empty($userExistsError) ? $userExistsError : ''; ?></p>


    <div class="tab">
      <p id="numberError"></p>
      <input id="number" type="number" placeholder="Enter code..." oninput="this.className = ''" name="VCode" required>
      <!-- <a href="../backend/sendmail.php" id="resend_code">Retrimite codul</a> -->
    </div>
    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" id="nextBtn" onclick="">Next</button>
        <button type="button" id="prevBtn" onclick="" style="display: none;">Next</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
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
    const resend_code = document.getElementById("resend_code");
    const resed_code_php_link = "<?php echo "this is me"; ?>";
    const form = new MultiStepForm(tabs, prevBtn, nextBtn);

    const number = document.getElementById("number");

    const number_error = document.getElementById("numberError");
    prevBtn.addEventListener("click", () => form.nextPrev(-1));
    nextBtn.addEventListener("click", () => {
      console.log("this is the current tab:" + form.currentTab);
      let isValid = true;
      switch (form.currentTab){
        case 0:
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

unset($_SESSION['CAccountEmailError']);
unset($_SESSION['EmailExistError']);
unset($_SESSION['enter_code_error']);
  exit;


?>