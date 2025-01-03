
 export class ValidateUserData{
    // validate user names
    ValidateNames(name, error) {
        const regExp = /^[A-Za-zĂÎȘȚÂăîșțâ.-]+(?:\s[A-Za-zĂÎȘȚÂăîșțâ.-]+)*$/;
        if (!name || typeof name !== 'string'){
            console.log("holla");
            error.innerHTML = "Câmpul nu poate fi gol și trebuie să fie text";
            return false;
        }

        // Validate the name format using the regular expression
        if (!regExp.test(name)){
            error.innerHTML ="Formatul campului nu este acceptat";
            return false;
        }
    
        // Check if the name length is within 3 and 50 characters
        if (name.length < 3 || name.length > 50) {
            error.innerHTML = "Câmpul trebuie să aibă între 3 și 50 de litere";
            return false;
        }
        error.innerHTML = "";  // Clear any error message
        return true;
    }

    ValidatePostsContent(post, errorElement) {
        const regExp = /^[A-Za-zĂÎȘȚÂăîșțâ0-9\s.,'"/\-!?@#$%^&*()_+=:;<>~`{}[\]\\|]*$/;
        
        if (!post || typeof post !== 'string') {
            errorElement.innerHTML = "Câmpul nu poate fi gol și trebuie să fie text";
            return false;
        }
    
        if (!regExp.test(post)) {
            errorElement.innerHTML = "Formatul câmpului nu este acceptat";
            return false;
        }
    
        if (post.length < 5 || post.length > 2500) {
            errorElement.innerHTML = "Câmpul trebuie să aibă între 3 și 2500 de caractere";
            return false;
        }
    
        errorElement.innerHTML = "";  // Clear errors if validation passes
        return true;
    }
    
    
    

    // Validate user email
    ValidateEmail(email, error){
        let regExp = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if(!email){
            error.innerHTML = "Email nu poate fi null";
            return false;
        }
        if(!regExp.test(email)){
            error.innerHTML = "Formatul emailului nu este acceptat";
            return false;
        }
        error.innerHTML = "";
        return true;
    }

    // validate date
    ValidateDate(date, error) {
        // Check if the date is empty
        if (!date) {
            error.innerHTML = "Data nu poate fi goală";
            return false;
        }
    
        // Check if the input is a valid date
        const userDate = new Date(date);
        const today = new Date();
        
        // Set time of today to 00:00 to compare only the date (ignore the time)
        today.setHours(0, 0, 0, 0);
    
        if (isNaN(userDate)) {
            error.innerHTML = "Formatul datei nu este valid";
            return false;
        }
    
        // Check if the entered date is today or in the future
        if (userDate < today) {
            error.innerHTML = "Data trebuie să fie astăzi sau în viitor";
            return false;
        }
    
        // Clear the error message if all checks pass
        error.innerHTML = "";
        return true;
    }
    

    // validate user int

    ValidateIntegers(integer, error){
        let reqExp = /^\d+$/;
        if(!integer){
            error.innerHTML = "Campul nu poate fi gol"
            return false;
        }
        if(!reqExp.test(integer)){
            error.innerHTML = "Campul trebuie sa fie numar"
            return false;
        }
        error.innerHTML = '';
        return true;
    }
    

    // validate user password

    ValidatePasswords(password,error){
        const regExp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if(!password){
            error.innerHTML = "Parola nu poate fi null";
            return false;
        }
        if(!regExp.test(password)){
            error.innerHTML = "Formatul parolei nu corespunde";
            return false;
        }
        error.innerHTML = "";
        return true;
    }

    //validate floats

    validateFloat(input, errorElement) {
        const floatRegex = /^-?\d+(\.\d+)?$/;
    
        // Check if input is empty
        if (input === '' || input === null || input === undefined) {
            errorElement.innerHTML = "Input can't be empty";
            return false;
        }
    
        // Test the input against the float regex
        if (!floatRegex.test(input)) {
            errorElement.innerHTML = "Needs to be a valid number";
            return false;
        }
    
        // Clear the error if validation passes
        errorElement.innerHTML = '';
        return true;
    }
    

    // Validate if passwords matchc

    CheckIfPasswordsMatch(password, confirm_password, error){
        if(password !== confirm_password){
            error.innerHTML = "Parolele nu corespund";
            return false;
        }
        error.innerHTML = '';
        return true;
    }

}

