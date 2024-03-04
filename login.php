<?php
$servername = "193.85.203.188";
$username = "khachaturyan";
$password = "1234";
$dbname = "khachaturyan";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $_SESSION["username"] = $username;
        header("Location: index.html"); 
        exit();
    } else {
        echo "Invalid username or password";
    }
}
$conn->close();
?>
