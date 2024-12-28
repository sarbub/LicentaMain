import { ValidateUserData } from "./validation.js";

class classValidateUserData{
    constructor(){
        this.userEmail = null;
        this.userEmailError = null;

        this.userPassword = null;
        this.userPasswordError = null;

        this.userForm = null;
        this.userSubmitButton = null;

        this.validator = new ValidateUserData();
    }

    MainAction(){
        this.userEmail = document.querySelector("#email");
        this.userEmailError = document.querySelector("#emailError");
        this.userPassword = document.querySelector("#password");
        this.userPasswordError = document.querySelector("#passwordError");

        this.userForm = document.querySelector("#loginForm");
        this.userSubmitButton = document.querySelector("#loginButton");


        this.userSubmitButton.addEventListener("click",(event)=>{
            event.preventDefault();
            let isValid = true;

            if(!this.validator.ValidateEmail(this.userEmail.value, this.userEmailError)){
                isValid = false;
            }
            if(!this.validator.ValidatePasswords(this.userPassword.value, this.userPasswordError)){
                isValid = false;
            }

            if(!isValid){
                return false;
            }

            this.userForm.submit();

        })

    }
}

document.addEventListener('DOMContentLoaded', () => {
    var ValidateInformation = new classValidateUserData();
    ValidateInformation.MainAction();
});