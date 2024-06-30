<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN PAGE</title>
    <Link rel="stylesheet" href="login.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

</head>
<body>
    <img src="pictures/Ellipse 1.png" id="circle2">
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
    <p id="log"> LOG IN</p>
    <div class="main">
        <div class="loglogo">
            <img src="pictures/login logo.png" id="loginlogo" ALT="login logo">
            <div id="text">WELCOME BACK LOGIN TO ACCESS THE BOOK HUB</div>
        </div>
        <div id="form">


        <form class="form" method="post" action="login_verify.php">

        <label for="user">EMAIL ADDRESS</label>
        <input type="email" name="username" id="user" required >

        <label for="pass">PASSWORD</label>
        <input type="password" name="password" id="pass" required>

        <button id="continuebtn" type="submit" name="submit">CONTINUE</button>
        <a href="forgot.php" id="forgotbtn">FORGOT PASSWORD</a>






        </form>
        </div>
    </div>
<div id="smallcircle"></div>
<div id="circle1"></div>

</body>
</html> 
