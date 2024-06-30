
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <Link rel="stylesheet" href="signup.css"> 
</head>
<body>
    <img src="pictures/Ellipse 2.png" id="circle2">
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
    <p id="log">SIGN UP</p>
     <div class="container">


     <form action="insert_data.php" method="post" enctype="multipart/form-data">
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="text" name="firstname" placeholder="First Name"><br>
    <input type="text" name="lastname" placeholder="Last Name"><br>
    <input type="email" name="emailadd" placeholder="Email"><br>
    <label for="profile_picture">Profile Picture:</label>
    <input type="file" name="profile_picture" id="profile_picture"><br>

    <!-- Label for Cover Photo -->
    <label for="cover_photo">Cover Photo:</label>
    <input type="file" name="cover_photo" id="cover_photo"><br>
    <input type="submit" value="Submit">

    <p>ALREADY HAVE AN ACCOUNT ?   <a href="login.html"> LOG IN</a> </p>
</form>









</body>
</html>