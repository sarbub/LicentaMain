<?php
class ValidateUsersData
{
    // Validate user names
    public function validateNames($name)
    {
        $regExp = "/^[A-Za-zĂÂÎȘȚăâîșț.\-]+(?:\s[A-Za-zĂÂÎȘȚăâîșț.\-]+)*$/u";
        if (empty($name) || !is_string($name)) {
            return false;
        }

        if (!preg_match($regExp, $name)) {
            return false;
        }

        if (strlen($name) < 2 || strlen($name) > 70) {
            return false;
        }

        return true; // Valid name
    }

    //validate post content


    public function validatePostContent($content)
    {
        if (empty($content) || !is_string($content)) {
            return false;
        }
    
        // Allow numbers, special characters, and basic HTML tags
        $regexp = "/^[\p{L}\p{N}\p{P}\p{Z}\n\r\t!@#\$%\^&\*\(\)_\+]+$/u";
    
        if (!preg_match($regexp, $content)){ 
            return false;
        }
    
        // Adjust length limits as needed
        if (strlen($content) < 5 || strlen($content) > 500) { 
            return false;
        }
        return true; 
    }


    // Validate user email
    public function validateEmail($email)
    {
        $regExp = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if (empty($email)) {
            return false;
        }

        if (!preg_match($regExp, $email)) {
            return false;
        }
        return true; // Valid email
    }

    // Validate user integers
    public function validateIntegers($integer)
    {
        if (empty($integer)) {
            return false;
        }

        if (!filter_var($integer, FILTER_VALIDATE_INT)) {
            return false;
        }

        return true; // Valid integer
    }

    // validate numbers
    public function validateNumbers($number)
    {
        if ($number === '') {
            return false; // If the number is an empty string, it's invalid
        }

        // Check if the number is numeric and not an empty string
        if (!is_numeric($number)) {
            return false; // If it's not numeric, it's invalid
        }

        // Check if the number is 0 (0 is a valid number)
        if ($number === 0) {
            return true; // 0 is a valid number
        }

        return true; // Valid number (either integer or float)
    }



    // Validate user password
    public function validatePasswords($password)
    {
        $regExp = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

        if (empty($password)) {
            return false;
        }

        if (!preg_match($regExp, $password)) {
            return false;
        }

        return true; // Valid password
    }

    // Validate if passwords match
    public function checkIfPasswordsMatch($password, $confirmPassword)
    {
        if ($password !== $confirmPassword){
            return false;
        }
        return true; // Passwords match
    }

    public function checkIfValueExistsInDatabase($colName, $data, $conn)
    {
        $sql = "SELECT * FROM users WHERE $colName = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $data);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Value exists in database, return false (not unique)
            return false;
        }
        // Value does not exist in database, return true (unique)
        return true;
    }

    public function generateSixDigitRandomNumber()
    {
        return mt_rand(100000, 999999);
    }

    public function generateRandomString($length = 10)
    {
        // Allowed characters
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $specialChar = '@$!%*?&';
        $uppercaseChar = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789'; // Added numbers
    
        // Ensure there's at least one special character, one uppercase letter, and one number
        $randomString = '';
        $randomString .= $specialChar[rand(0, strlen($specialChar) - 1)]; // Add a special character
        $randomString .= $uppercaseChar[rand(0, strlen($uppercaseChar) - 1)]; // Add an uppercase letter
        $randomString .= $numbers[rand(0, strlen($numbers) - 1)]; // Add a number
    
        // Fill the remaining characters with a mix of allowed characters
        $remainingLength = $length - 3; // Since we've already added 3 characters (1 special, 1 uppercase, 1 number)
        $charactersLength = strlen($characters);
    
        for ($i = 0; $i < $remainingLength; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    
        // Shuffle the string to randomize the position of special char, uppercase, and number
        return str_shuffle($randomString);
    }
    
    
}
