<?php

$post_id = $_POST['post_id'];
$report_title = $_POST['report_title'];
$post_comment = $_POST['post_comment'];
$report_message = $_POST['report_message'];

$con = mysqli_connect("localhost", "root", "", "bookhub");

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "INSERT INTO reports (post_id, report_title, post_comment, report_message) VALUES ('$post_id', '$report_title', '$post_comment', '$report_message')";

if (mysqli_query($con, $query)) {
    header('Location: index.php');
    exit; 
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
