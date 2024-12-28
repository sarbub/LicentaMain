<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "centrulvietii";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("there was a problem:".$conn->connect_error);
}
?>