<?php

class FetchUserDataMain {


    public function fetchDataFromUsers($conn, $table, $column, $value) {
        // Prepare the SQL statement to prevent SQL injection
        $sql = "SELECT * FROM $table WHERE $column = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $value); // Bind the user email value
        $stmt->execute();
        $result = $stmt->get_result(); // Get the result
        // Check if there are results
        if ($result->num_rows > 0) {
            // Return the result set
            return $result;
        }
    
        // Return null if no rows were found
        return null;
    }
    
    public function checkIfDataExistsInTable($conn, $table, $column, $value) {
        // Use prepared statements to prevent SQL injection
        $sql = "SELECT 1 FROM $table WHERE $column = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $stmt->store_result();
    
        // Check if any rows were returned
        $exists = $stmt->num_rows > 0;
    
        // Close the statement and return result
        $stmt->close();
        return $exists;
    }

    public function selectDataViaTableNameAndFK($conn, $table, $column, $value) {
        $sql = "SELECT * FROM $table WHERE $column = ? ORDER BY `event_id` DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $value); // Assuming $value is a string
        $stmt->execute();
        $result = $stmt->get_result(); // Get the result set
        $stmt->close();
        return $result; // Return the MySQLi result object
    }
    
    

    public function fetchDataFromUsersByTable($conn, $table) {
        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);
        
        // Check if there are results
        if ($result->num_rows > 0) {
            return $result;
        }
        
        // Return null or empty array if no rows found
        return null;  // or you could use: return [];
    }
    
    public function fetchDataFromUsersByTableRev($conn, $table) {
        $sql = "SELECT * FROM $table ORDER BY `id` DESC";
        $result = $conn->query($sql);
        
        // Check if there are results
        if ($result->num_rows > 0) {
            return $result;
        }
        
        // Return null or empty array if no rows found
        return null;  // or you could use: return [];
    }
    
    public function fetchDataFromDBDesc($conn, $table, $order_by) {
        $sql = "SELECT * FROM $table ORDER BY $order_by DESC";
        $result = $conn->query($sql);
        // Check if there are results
        if ($result->num_rows > 0){
            return $result;
        }
        
        // Return null or empty array if no rows found
        return null;  // or you could use: return [];
    }
    
    public function fetchDataFromUsersEvents($conn) {
        $sql = "SELECT * FROM users_events";
        $result = $conn->query($sql);
        
        // Check if there are results
        if ($result->num_rows > 0) {
            return $result;
        }
        
        // Return null or empty array if no rows found
        return null;  // or you could use: return [];
    }
    
    public function fetchDataFromUsersAditionalInformation($conn) {
        $sql = "SELECT * FROM aditional_user_info";
        $result = $conn->query($sql);
        
        // Check if there are results
        if ($result->num_rows > 0) {
            return $result;
        }
        
        // Return null or empty array if no rows found
        return null;  // or you could use: return [];
    }
    
    function CountUserData($conn, $userId) {
        try {
            // Prepare the SQL statement to count posts with a specific user ID
            $stmt = $conn->prepare("SELECT COUNT(*) AS post_count FROM users_posts WHERE fk = ?");
            $stmt->bind_param("i", $userId);
            
            // Execute the statement
            $stmt->execute();
            
            // Get the result
            $result = $stmt->get_result();
            
            // Fetch the count
            $row = $result->fetch_assoc();
            $postCount = $row['post_count'];
            
            // Close the statement
            $stmt->close();
            
            // Return the count
            return $postCount;
            
        } catch (Exception $e) {
            // Log error or handle it as needed
            error_log("Error counting user data: " . $e->getMessage());
            return 0; // Return 0 if there's an error
        }
    }
    
    function removeRow($conn, $userTable, $userId) {
        try {
            $sql = "DELETE FROM $userTable WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $userId);
            
            if ($stmt->execute()) {
                return true;
            }
            
        } catch (Exception $e) {
            // Handle or log the error as needed
            error_log("Error deleting row: " . $e->getMessage());
            return false;
        }
        
        $stmt->close();
    }

    public function generateRandomString($length = 10)
{
    // Allowed characters
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=<>?';
    $specialChar = '!@#$%&*?';
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
?>
