<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookhub";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT user_id,firstname, lastname FROM login WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Successful login, redirect to home page
    session_start();
    $_SESSION['username'] = $username;

    $row = $result->fetch_assoc();

    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['profile_picture'] = ['name' => $row['pname'],'type' => $row['ptype'],'content' => $row['pcontent']];

    header("Location: index.php");
} else {
    // Invalid credentials, redirect back to the login page
    header("Location: index.html");
}
$conn->close();
?>