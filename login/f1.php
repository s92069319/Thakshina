<?php
$servername="localhost";
$username="root";
$password="";
$dbname="bookhub";
$ee=$_POST['mail'];

$con = new mysqli($servername,$username,$password,$dbname);

if($con ->connect_error){
    die("Connection failed: ".$con->connect_error);
}

$sql="SELECT emailadd from login where emailadd='$ee'";
$result=$con->query($sql);

if($result->num_rows==1){
    $otp=rand(100000,999999);
    session_start();
    session_regenerate_id();
    $_SESSION['otp']=$otp;
    $_SESSION['e']=$ee;
    header('Location:enterpin.php');
}
else{
    echo "<script>alert('No email found');window.location.href='forgot.php';</script>";
}
$con->close();
?>