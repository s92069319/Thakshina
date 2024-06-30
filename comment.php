<?php 
session_start();

if (!isset($_SESSION['username'])) 
{
    header("Location: login.php");
    exit();
}
$con = mysqli_connect("localhost", "root", "", "bookhub");

if (mysqli_connect_errno()) 
{
    die("Connection failed: " . mysqli_connect_error());
}



$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$post_id = $_POST['post_id'];
$content=$_POST['content'];



$query="insert into comment(username,firstname,lastname,post_id,content) values('$username','$firstname','$lastname','$post_id','$content')";

 mysqli_query($con,$query);
 header("Location: index.php");
exit();



?>