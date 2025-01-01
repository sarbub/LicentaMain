
 export class ValidateUserData{
    // validate user names
    ValidateNames(name, error) {
        const regExp = /^[A-Za-zĂÎȘȚÂăîșțâ.-]+(?:\s[A-Za-zĂÎȘȚÂăîșțâ.-]+)*$/;
        if (!name || typeof name !== 'string'){
            error.push = "Câmpul nu poate fi gol și trebuie să fie text";
            return false;
        }

    
        // Validate the name format using the regular expression
        if (!regExp.test(name)){
            error.push = "Formatul campului nu este acceptat";
            return false;
        }
    
        // Check if the name length is within 3 and 50 characters
        if (name.length < 3 || name.length > 50) {
            error.push = "Câmpul trebuie să aibă între 3 și 50 de litere";
            return false;
        }
        error.innerHTML = "";  // Clear any error message
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

