<?php
include "../backend/php_backend/connection.php";

if (isset($_POST['upload'])) {
    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageType = mime_content_type($imageTmp);  // Get MIME type
    $allowedTypes = ['image/jpeg', 'image/png'];  // Allow only JPG and PNG

    if (!in_array($imageType, $allowedTypes)) {
        echo "Only JPG and PNG images are allowed.";
    } else {
        $imageData = file_get_contents($imageTmp);
        $firstName = "bogdan"; 
        $lastName = "Sarbu";  
        $email = "Sarbub5d4dddsdf3@gmail.com";  
        $userPassword = "Sarbub5@gmail.com"; 
        $accountType = "student"; 

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Prepare the query
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, user_password, account_type, profile_image) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sssssb", $firstName, $lastName, $email, $userPassword, $accountType, $null);
        $stmt->send_long_data(5, $imageData);  

        if ($stmt->execute()) {
            echo "Image uploaded successfully!";
        } else {
            echo "Failed to upload image.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UploadImage</title>
</head>
<body>
  <?php
include "../backend/php_backend/connection.php";
$sql = "SELECT first_name, last_name, email, account_type, profile_image FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imageData = base64_encode($row['profile_image']);
        $imageSrc = 'data:image/jpeg;base64,' . $imageData; // Assuming the image is JPEG

        echo "<div>";
        echo "<h3>" . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</h3>";
        echo "<p>Email: " . htmlspecialchars($row['email']) . "</p>";
        echo "<p>Account Type: " . htmlspecialchars($row['account_type']) . "</p>";
        echo "<img src='" . $imageSrc . "' alt='Profile Image' style='width:200px;height:auto;'/>";
        echo "</div>";
    }
} else {
    echo "No users found.";
}


?>
<form action="" method="post" enctype="multipart/form-data">
    <label for="file">Select image:</label>
    <input type="file" name="image" id="file">
    <input type="submit" name="upload" value="Upload">
</form>

</body>
</html>