<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FORGOT PASSWORD ENTER PIN PAGE</title>
    <Link rel="stylesheet" href="enterpin.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>
<body>
    <img src="pictures/Ellipse 7.png" id="circle2">
    <img src="pictures/Vector 4.png" class="P1">
    <img src="pictures/Vector 2.png" class="P2">
    <div class="nav">
        <ul>
          <li><a href="policy.php" class="privacy">PRIVACY POLICY</a></li>
          <li><a href="help.php" class="help">HELP</a></li>
          <li><a href="about.php" class="about">ABOUT US</a></li>
          <li><a href="signup.php" class="signup">SIGN UP</a></li>
          <li><a href="login.php" class="login">LOGIN</a></li>
        </ul>
    </div>
    <div class="logo">
        <img src="pictures/logo.png" class="logo">
    </div>
    <h1>FORGOT PASSWORD </h1>
    <div id="smallcircle"></div>
    <div id="circle1"></div>
    <div class="container">
        <form method="post" action="f3.php">
        <p id="p1">Send an email to </p>
        <p id="p2">We sent you a code, Check your email to get your confirmation code. If you need to request a new code, go back and reselect a confirmation. </p>
        <p id="p3">Enter Your Digit Codes</p>
        <input id="input1" type="number" name="otp" value=<?php session_start();echo $_SESSION['otp']; ?>> 
        <button type="submit" name="e">NEXT</button></a>
        </form>
    </div>

</body>
</html>