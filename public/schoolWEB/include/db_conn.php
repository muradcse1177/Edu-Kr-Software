<?php
$servername = "182.160.118.52";
$username = "appUser";
$password = "appUser";
$dbname = "schoolmngmnt";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>