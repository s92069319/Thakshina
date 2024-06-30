<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookhub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['matname'], $_POST['name'], $_POST['rating'])) {
        $matname = $_POST['matname'];
        $name = $_POST['name'];
        $rating = $_POST['rating'];

        $stmt = $conn->prepare("INSERT INTO ratings (name, firstname, lastname, matname, rating) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $firstname, $lastname, $matname, $rating);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'> alert('Rating added successfully')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Incomplete form data received";
    }
} else {
    echo "Form not submitted";
}

$conn->close();
?>
