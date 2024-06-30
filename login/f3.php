<?php
session_start();
session_regenerate_id();
if($_SESSION['otp']==$_POST['otp']){
    header('Location:passwordchange.php');
}
else{
    echo "Invalid OTP code";
}
?>