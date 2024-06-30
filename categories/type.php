
<?php

session_start();
if (!isset($_SESSION['username'])) 
{
    header("Location: login.php");
    exit();
}


$username = $_SESSION['username'];

$profilePicture = $_SESSION['profile_picture'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navigation and Columns</title>
  <link rel="stylesheet" href="type.css">
  <link rel="stylesheet" href="categories.css">

</head>
<body>

<script src="/1CW/nav/nav.js"></script>
    <div id="contentPlaceholder"></div>

    <br>

    <?php 

  
$conn = new mysqli("localhost","root","","bookhub");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM login WHERE username='$username'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Display data in a table


  while ($row = $result->fetch_assoc()) {
    echo "<img src='data:" . $row["ptype"] . ";base64," . base64_encode($row["pcontent"]) . "' width='70' height='70' style='border-radius: 100px; border: 2px solid #000; margin-left: 40px;'>";

         
  }

} else {
  echo "No data found";
}

?>          <?php
echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; 


?>
  <!-- Navigation Bar -->
<div class="container">







<div class="column" id="category-column">



<ul class="categories">
        <li><a href="/1CW/categories/categories.php" >BOOKS</a></li>
        <li><a href="/1CW/categories/categories.php" >MAGAZINES</a></li>
        <li><a href="/1CW/categories/categories.php" >JOURNALS</a></li>
        <li><a href="/1CW/categories/categories.php" >COMICS</a></li>
        <li><a href="/1CW/categories/categories.php" >NEWS PAPERS</a></li>
  </ul>
      


</div>
<!--------------END 1ST COL--------------------->






<!--------------START 2ND COL------------------------------------------------------------------------------------------------------------------->
<div class="column" id="second-column">

























<?php


if (isset($_GET['category'])) {
  $category = $_GET['category'];

  echo $category;
}

  
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bookhub";
        


        $conn = new mysqli($servername, $username, $password, $dbname);


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }



        if (isset($_GET['category'])) {
            $category = $_GET['category'];


        $query = "SELECT * FROM documents where readingtypes='$category'";
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
        echo "<div class='post'>";

                $imageData = $row['content'];
                $imageType = $row['type']; 

                ?><?php 
      
         
                echo '<img src="data:' . $imageType . ';base64,' . base64_encode($imageData) . '" height="300" width="200" style="border: 0px solid #000; margin-left: 90px;">';



                ?>

            
                <br><br>
                <?php  echo "Book ID : "; echo $row['rdid']; ?> <br>
                <?php echo "Category : "; echo $row['categories']; ?> <br>
                <?php echo "Type : "; echo $row['readingtypes'];?> <br>
                <?php echo "Book Name : ";  echo $row['matname'];?> <br>


              <?php

            

              ?><?php


              echo '<a href="review.php?id=' . $row['rdid'] . '&matname=' . urlencode($row['matname']) . '">  <button type="button" class="custom-button">View Book</button> </a>';


        echo "</div>";   
        }


  

    }

    else {
        echo "Invalid category";


    }

        mysqli_close($conn);
        ?>

 




</div>
<!--------------END 2ND COL-------------------------------------------------------------------------------------------------------------------->

   





<!--------------START 3RD COL-------------------------------------------------------------------------------------------------------------------->
    <div class="column" id="third-column">
    
<H2>Advertisement<H2><BR>
      <?php


  
$conn = new mysqli("localhost","root","","bookhub");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM ads"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Display data in a table


  while ($row = $result->fetch_assoc()) {
    echo "<img src='data:" . $row["type"] . ";base64," . base64_encode($row["content"]) . "' width='200' height='300' style='border-radius: 00px; border: 2px solid #000; margin-left: 0px;'>";

    echo "<BR>";   echo "<BR>";
  }

} else {
  echo "No data found";
}

?>  


      </div>
<!--------------END 3RD COL-------------------------------------------------------------------------------------------------------------------->     
   






  </div>



</body>
</html>
