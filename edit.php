
<?php 
session_start();

if (!isset($_SESSION['username'])) 
{
    header("Location: login.php");
    exit();
}
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookhub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data to pre-fill the form
$userData = getUserData(); // Replace with your own function to fetch user data

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    // Get data from the form 
    $username=$_SESSION['username'];
    $newName = $_SESSION['firstname'];
    $newEmail = $_SESSION['emailadd'];
    $newPassword = $_POST['password'];
    
    
   
    $username = $_SESSION['username'];

  if (isset($_POST['editName'])) {
        $sql = "UPDATE login SET firstname = '$newName' WHERE username = '$username'";
        $userData['fisrtname'] = $newName;
    } elseif (isset($_POST['editEmail'])) {
        $sql = "UPDATE login SET emailadd = '$newEmail' WHERE username = '$username'";
        $userData['emailadd'] = $newEmail;
    }
    elseif (isset($_POST['editPassword'])) {
        $sql = "UPDATE login SET password = '$newPassword' WHERE username = '$username'";
        $userData['password'] = $newPassword;
    }
   


    if ($conn->query($sql) === TRUE) {
        // Update user data after successful update
        header("Location: ".$_SERVER['PHP_SELF']); // Redirect to the same page after update
        exit();
    } else {
        echo "Error updating user information: " . $conn->error;
    }
}

$conn->close();

function getUserData() {
   
    $username = $_SESSION['username'];

    global $conn;
    $sql = "SELECT * FROM login WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Information</title>
    <style>
          .retrive1{
    margin-left: -130px;
    margin-top: 240px; 
    position: fixed;    
}
.retrive2{
    margin-left: -50px;
    margin-top: 360px; 
    position: fixed;    
}

* {
  box-sizing: border-box;
}
.navbar {
  overflow: hidden;
  background-color: #0295A9;
  position: fixed; /* Set the navbar to fixed position */
  top: 0px; /* Position the navbar at the top of the page */
  width: 99.8%;
  left:1px; 
  height: 70px;    
  border-radius: 12px 12px 0px 0px;
}

/* Links inside the navbar */
.navbar a {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 25px 18px;
  text-decoration: none;
  font-weight: bold;
  font-family: sans-serif;
  font-size: 14px;
}

/* Change background on mouse-over */
.navbar a:hover {
  color: #015965;
}

.navbar input[type=text] {
  padding: 6px;
  border: none;
  margin-top: 20px;
  margin-left: 570px;
  font-size: 10px;
  width: 300px;
  height: 29px;
  text-align: center;
  border-radius: 10px;
}

.logo {
  position:fixed;
  top: 15px;
  left: 20px;
  width: 99px;
  height:40px;
}
/* Links inside the navbar */
.home a {
  color: #f2f2f2;
  display: block;
  position: fixed;
  top: 26px;
  left: 400px;
  text-decoration: none;
  font-weight: bold;
  font-family: sans-serif;
  font-size: 15px;
}

.home a:hover {
  color: #015965;
}

* {
  box-sizing: border-box;
}

body {
  margin: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.container {
  margin-top: 40px; /* Adjust for the fixed header */
  display: flex;
  flex-direction: column;
  align-items: center;
}

.row {
  display: flex;
  justify-content: center;
  max-width: 1000px; /* Set the maximum width of the row */
  width: 100%; /* Make sure the row takes up the full width */
  padding: 10px; /* Add some spacing */
  box-sizing: border-box;
}

.column {
  width: 25%; /* 4 columns in a row */
  padding: 10px;
  text-align: center;
}

.column p{
 font-size: 12px;
 font-family: monaco;
}

.row img {
  height: 140px;
  width: 110px;
  margin: 0 auto; 
  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);
/* Center align the images within columns */
}
.book-head {
  text-align: center; /* Adjust as needed */
}

.book {
  font-size: 25px;
  font-weight: bold;
  margin-left :-35px;
  margin-top: 100px;
  color:  #0295A9;
  font-family: sans-serif;
  width: 100px;
  border-bottom: 0.3rem solid transparent;
  border-image: linear-gradient(to right, #0295A9, #f2f2f2) 1;
 
}

.cat {
  font-size: 17px;
  color: #666;
  margin-left :-300px;
  margin-top:-45px;
  font-style: italic;
  font-family: Copperplate;
}
.class2 , .class3{
	float: right;
}

.bnr {
  font-size: 19px;
  font-family: sans-serif;
  position: fixed; /* Position the element in a fixed position */
  top: 70px; /* Adjust the top position to make it appear below the fixed header */
  right: 80px; /* Adjust the right position as needed */
}

.bnr1 img {
  width: 130px;
  height: 180px;
  position: fixed; /* Position the element in a fixed position */
  top: 150px; /* Adjust the top position to make it appear below the fixed header */
  right: 15px; /* Adjust the right position as needed */
}
.class2 .line{
	width: 300px;
	position:fixed;
	top: 127px;
  right: 19px;
}

.book-name, .author-name, .category, .date,.note {
  font-family: sans-serif; 
  position: fixed;
  color: #333; /* Adjust the color as desired */
}
.bnr1 .category {
  top: 145px;
  right: 261px;
  font-size: 14px;
}

.bnr2 .category {
  top: 393px;
  right: 224px;
  font-size: 14px;
}
.bnr1 .book-name{
  top: 170px;
  right: 235px;
  font-size: 16px;
  color:  #0295A9;
  font-weight: bold;
}
.bnr2 .book-name{
  top: 419px;
  right: 242px;
  font-size: 16px;
  color:  #0295A9;
  font-weight: bold;
}
.bnr1 .author-name {
  top: 197px;
  right: 202px;
  font-size: 15px;
  font-weight: bold;
}
.bnr2 .author-name {
  top: 448px;
  right: 187px;
  font-size: 15px;
  font-weight: bold;
}


.bnr1 .date {
  top: 240px;
  right: 242px;
  font-size: 12px;
}
.bnr2 .date {
  top: 492px;
  right: 243px;
  font-size: 12px;
}
.bnr1 .fullreview{
  position: fixed;
  top: 280px;
  right:248px;
  font-size: 12px;
  color: #666;
  font-style: italic;
}
.bnr2 .fullreview{
  position: fixed;
  top: 530px;
  right:247px;
  font-size: 12px;
  color: #666;
  font-style: italic;

}

.bnr1 a{
  text-decoration:none;
}
.bnr2 a{
  text-decoration:none;
}
.bnr1 .note{
  top: 330px;
  left: 1051px;
  font-size:11px ;
  font-family: cursive;
}
.bnr2 .note{
  top: 576px;
  left: 1053px;
  font-size:11px ;
  font-family: cursive;
}
.class3 .line{
	width: 300px;
	position:fixed;
	top: 380px;
    right: 19px;
}



.bnr2 {
  position: fixed; /* Position the element in a fixed position */
  top: 70px; /* Adjust the top position to make it appear below the fixed header */
  right: 80px; /* Adjust the right position as needed */
}

.bnr2 img {
  width: 130px;
  height: 180px;
  position: fixed; /* Position the element in a fixed position */
  top: 400px; /* Adjust the top position to make it appear below the fixed header */
  right: 15px; /* Adjust the right position as needed */
}
.footer {
  background-color: #0295A9; 
  border-radius: 0px 0px 13px 13px ;
  text-align: center;
  position: fixed; 
  bottom: 0px;
  width: 100%; 
  height: 25px;
  left: 0;
  right: 0;
}

.footer-left {
  float: left;
  margin-left: 10px;
  line-height: 1px;
  color: #d9d9d9;
  font-size: 10px;
  }

.footer-right {
  display: flex;
  align-items: center; /* Vertically center-align the content */
  float: right;
  margin-right: 10px;
  font-size: 14px;
  font-family: tahoma;
}

.footer-right a {
  text-decoration: none;
  color: #d9d9d9;
  padding: 4px 40px;
  padding-right: 10px;
}
.footer-right a:hover {
  color: #015965;
  font-weight: bold;
}

dp {
    display: flex;
    height: 20vh;
    margin: 0;
}

.circular-image {
    width: 75px; /* Adjust the size of the circular container as needed */
    height: 75px;
    border-radius: 50%; /* Makes the container circular */
    overflow: hidden; /* Clips the image to fit the circular container */
    margin-left: 20px;
    margin-top: 80px;
}

.circular-image img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the circular container */
}
.name{
    margin-left: 35px;
    margin-top: 10px;
    font-family: sans-serif;
    font-size: 20px;
}

        .box {
            width: 600px; /* Set the desired width */
            height: 150px; /* Set the desired height */
            border: 1px solid #000; /* Add a border (you can change the color) */ 
            margin-left: 50px;
            margin-top: 50px;
            padding: 10px; /* Add padding inside the box */
            border-radius: 10px;
        }

        .edit-button {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        .edit-form {
            display: none;
        }
        .one{
          margin-left:20px;
        }
        .two,.info-content{
          margin-left:150px
        }
        .edit-button{
          margin-left:75px;
        }

        .savebutton{
  padding: 10px 150px; /* Padding for button size */
  color: #fff; /* Text color */
  border: none; /* No default border */
  cursor: pointer;
  border-radius: 10px;
  background: linear-gradient(to right,#0295A9,#90dde7);
  margin-top: 40px;
}
.savebutton:hover {
    border: 2px solid #316b74; /* Black border on hover */
}

.accdelete{
  color: red;
  margin-right: -900px;
  cursor: pointer;
  font-family:Calibri;
  margin-top: 0px;

}
        
     </style>
</head>
<body>

<!--Header-->
<header>
<div class="navbar">
  <input type="text" placeholder="SEARCH READING MATERIALS">
  <a href="#Profile">PROFILE</a> 
  <a href="#Notifiction">NOTIFICATIONS </a>
  <a href="#Advance search">ADVANCE SEARCH </a>
</div>
<div class="home"><a href="#home" >HOME</a></div>
<div class="cornerlogo">
  <img src =Bookhub.png class="logo">
</div>
</header>

<!--center dp-->
<div id="dp">
    <div class="circular-image"> 
        <img src="dp.jpg" alt="Circular Image" id="dpic"> 
    </div> 



    <p class="firstname">
    <b style="color: black" id="dName" class="name"> <span id="display-name"><?php echo $userData['firstname']; ?></span> </b>
    </p>

   </div>

<!-- Display user data and edit form for name -->
<div class="box">
    <b>User Informations</b>
    <br>

    <!--   ProfilePic
    <div class="form_container"><br>
          <span class="one"> Profile Picture: </span>
            
          <span class="info-content" id="displaypic"> <?php echo $userData['pcontent']; ?></span> </span>
            
          <input type="file" name="profilePicture" id="profilePictureInput" accept="image/*" style="display: none;">                                                                  &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp
    <label for="profilePictureInput" class="edit-button">Edit</label>
        </div> -->
   

    <!-- First Name-->
    <div>
        <span class="one"> Name: 
        
        <span id="display-name" class="two"><?php echo $userData['firstname']; ?></span></span>                                   &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp
        
        <span class="edit-button" onclick="showEditForm('editName')">Edit</span>
    </div>
    <form action="" method="POST" class="edit-form editName">
        <label for="firstname"></label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $userData['firstname']; ?>" required>
       
        <input type="submit" name="editName" value="Update Name">
    </form>
    <!-- Email-->
    <div>
        <span class="one"> Email: 
        
        <span id="display-email" class="two"><?php echo $userData['emailadd']; ?></span></span>                                                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
      
        <span class="edit-button" onclick="showEditForm('editEmail')">Edit</span>                       
    </div>
    <form action="" method="POST" class="edit-form editEmail">
        <label for="emailadd"></label>
        <input type="email" name="emailadd" id="emailadd" value="<?php echo $userData['emailadd']; ?>" required>
        <input type="submit" name="editEmail" value="Update Email">
    </form>

     <!-- Password-->
    <div>
        <span class="one"> Password: 
        
        <span type="password" class="two"><?php echo $userData['password']; ?></span></span>                                                                               &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
         
        <span class="edit-button" onclick="showEditForm('editPassword')">Edit</span>
    </div>
    <form action="" method="POST" class="edit-form editPassword">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $userData['password']; ?>" required>
        <br>
        <input type="submit" name="editPassword" value="Update Password">
    </form>    
</div>


<!--Save button-->

<button class="savebutton" id="savebutton">SAVE AND CONTINUE</button>

</div>


<!--Delete account -->

<div class="accdelete" onsubmit="event.preventDefault()"> Delete your Book Hub Account </div>

<!--footer-->
<footer class="footer">
  <div class="footer-left">
    <p>Copy Rights @ FUTURE ENGINEERS The All Rights Reserved</p>
  </div>
  <div class="footer-right">
    <a href="#help">HELP</a>
    <a href="#about us">ABOUT US</a>
    <a href="#pp">PRIVACY POLICY</a>
  </div>
</footer>

<script>
    function showEditForm(formName) {
        var editForms = document.querySelectorAll('.edit-form');
        editForms.forEach(function(form) {
            form.style.display = 'none';
        });

        var editForm = document.querySelector('.' + formName);
        editForm.style.display = 'block';
    }

    // Add an event listener to the file input
    document.getElementById('profilePictureInput').addEventListener('change', function (event) {
        var fileInput = event.target;
        var file = fileInput.files[0];

        if (file) {
            // Update the circular image preview
            updateProfilePicturePreview(file);
        }
    });

    // Function to update the circular image preview
    function updateProfilePicturePreview(file) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var imagePreview = document.getElementById('dpic');
            imagePreview.src = e.target.result;
        };

        // Read the selected file as a data URL
        reader.readAsDataURL(file);
    }
    // Confirmation of info are saved 
    function showConfirmation() {
        alert("Your informations are successfully saved.");
      }
      // Attach the showConfirmation function to the click event of the "Save and Continue" button
      var saveButton = document.getElementById("savebutton"); // Assuming the button has the id "deleteButton"
      saveButton.addEventListener("click", showConfirmation);

      // Account Delete 
function confirmAccountDeletion() {
    var confirmation = confirm("Are you sure do want to delete your account?");
    if (confirmation) {
      // User clicked "OK" (Yes), proceed with account deletion
      alert("Your account has been deleted.");
      // Add code here to delete the account or perform any necessary actions
    } else {
      // User clicked "Cancel" (No), do nothing
    }
  }
  // Attach the confirmAccountDeletion function to the click event of the "Delete your Book Hub Account" button
  var deleteAccountButton = document.querySelector("accdelete");
  deleteAccountButton.addEventListener("click", confirmAccountDeletion);

 
    
</script>

</body>
</html>
