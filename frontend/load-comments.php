<?php
        include_once '../backend/php_backend/connection.php';
        $sql = "SELECT * FROM test_data";
        $result = mysqli_query($conn, $sql);
        $insertData = "INSERT INTO test_data(first_name) values ('data inserted')";
        $stmt_two = $conn->prepare($insertData);
        $stmt_two->execute();
        if ($stmt_two->affected_rows > 0){
            echo "User added successfully";
        } else {
            echo "there was an error";
        }
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<p>" .  $row['first_name'] . "</p>";
            }
        }else{
            echo "there are no comments";
        }
        ?>