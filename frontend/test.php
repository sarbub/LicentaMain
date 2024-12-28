<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Container styling */
        /* Container styling */
        .container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        /* Main div styling */
        .main_div {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        /* Button styling */
        .toggle_button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .toggle_button:hover {
            background-color: #0056b3;
        }

        /* Hidden content styling */
        .hidden_content {
            overflow: hidden;
            max-height: 0;
            margin-top: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 0 10px;
            transition: max-height 0.4s ease-in-out, padding 0.4s ease-in-out;
        }

        /* When visible */
        .hidden_content.visible {
            max-height: 300px;
            /* Adjust based on content size */
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main_div">
            <button class="toggle_button">Open Content</button>
            <div class="hidden_content">
                <p>This is the content inside the hidden div. You can put any text or elements here!</p>
            </div>
            <form method="post" action="" id="user_form">
                <input type="text" placeholder="name" name="name" id="user_name">
                <button type="submit" id="submit_btn">submit</button>
            </form>
        </div>
        <div class="display_data">
            <?php
            include_once '../backend/php_backend/connection.php';
            $sql = "SELECT * FROM test_data";
            $user_name = isset($_POST['name']) ? $_POST['name'] : 'no name';
            // insert data into users
            echo $user_name;
            if (!empty($_POST['name'])) {
                addData($conn, $user_name);
                // Redirect to avoid form resubmission
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }



            function addData($conn, $userName)
            {
                $insert_sql = "INSERT INTO test_data(first_name) values (?)";
                $stmt_two = $conn->prepare($insert_sql);
                $stmt_two->bind_param("s", $userName);
                $stmt_two->execute();
                if ($stmt_two->affected_rows > 0) {
                    echo "User added successfully";
                } else {
                    echo "there was an error";
                }
            }



            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<br>" . $row['first_name'];
                }
            }
            ?>
        </div>
    </div>


    <script>

        person = {name:"bogdan", age :22 , city : "Timisoara"};
        console.log(person.name);
        person.name = "diana";
        console.log(person.name);
        const obj = JSON.parse('{"name":"John", "age":30, "city":"New York"}');
        const cars = '["Saab", "Volvo", "BMW"]';
        const myJSON = '{"name":"John", "age":30, "cars":["Ford", "BMW", "Fiat"]}';
        const selector = JSON.parse(cars);
        const myJsonSelector = JSON.parse(myJSON);
        for(car in selector){
            console.log(car);
        }
        for(i in myJsonSelector.cars){
            console.log(myJsonSelector.cars[i]);
        }

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
        const myObj = JSON.parse(this.responseText);
        document.getElementById("demo").innerHTML = JSON.stringify(myObj);
        };

        const database = 'centrulvietii'; // Replace with the actual database name
        const table = 'test_data'; // Replace with the actual table name

        xmlhttp.open("GET", `http://localhost:3307/api/data/${database}/${table}`);
        xmlhttp.send();


        console.log(selector[1]);

        console.log(obj.city);  
        document.addEventListener("DOMContentLoaded", () => {
            const toggleButton = document.querySelector(".toggle_button");
            const hiddenContent = document.querySelector(".hidden_content");

            toggleButton.addEventListener("click", () => {
                // Toggle the `visible` class to control slide-down/up
                hiddenContent.classList.toggle("visible");
            });
        });

        var button = document.getElementById("submit_btn");
        var user_name = document.getElementById("user_name");
        var form = document.getElementById("user_form");
        button.addEventListener("click", (event) => {
            event.preventDefault();
            if (user_name.value.trim() !== "") {
                form.submit();
            } else {
                alert("Please enter a valid name.");
            }
        });
    </script>
</body>

</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XMLHttpRequest Example</title>
</head>
<body>
    <div id="output"></div> <!-- Area to display messages -->
    <script>
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "./test.txt", true);

        // Handle success and errors
        xhttp.onload = function () {
            let output = document.getElementById("output");
            if (xhttp.status >= 200 && xhttp.status < 300) {
                output.innerHTML = `<p style="color: green;">Request successful: ${xhttp.responseText}</p>`;
            } else {
                output.innerHTML = `<p style="color: red;">Request failed with status: ${xhttp.status} - ${xhttp.statusText}</p>`;
            }
        };

        // Handle network errors
        xhttp.onerror = function () {
            let output = document.getElementById("output");
            output.innerHTML = `<p style="color: red;">Network error occurred.</p>`;
        };

        // Send the request
        xhttp.send();
    </script>
</body>
</html>
