<?php include('server.php'); ?>

<?php

if (!isset($_SESSION['username'])) 
{
    header("Location: login.php");
    exit();
}


$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">
      <!-- META DATAS -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initail-scale=1.0">

        <!-- Title Name -->
        <title>Book Hub || Profile</title>

         <!-- CSS link -->
         <link rel="stylesheet" rel="stylesheet" href="/Assets/css/bootstrap.min.css">
        <link rel="stylesheet" rel="stylesheet" href="home.css">
        <link rel="stylesheet" rel="stylesheet" href="profile.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    
       
    </head>

    <body>
    
        <!-- Nav Bar Start -->
        <header>
    
        <script src="/1CW/nav/nav.js"></script>
        <div id="contentPlaceholder"></div>
  
        </header>
          <!-- Nav Bar End -->



          
    <!-- body start -->
            
    <div class ="container">
            <div class="profile-header">
         
                <div class="cover-image">

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
                            echo "<img src='data:" . $row["ctype"] . ";base64," . base64_encode($row["ccontent"]) . "' style='width: 100%; height: 300px;'>";
                        }

                        } else {
                        echo "No data found";
                        }

                ?>        






            
                </div>
        
              
                <div class="profile-image">
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
                        echo "<img src='data:" . $row["ptype"] . ";base64," . base64_encode($row["pcontent"]) . "' width='70' height='70' style='border-radius: 100px; border: 2px solid #000; margin-left: 0px;'>";
                        }

                        } else {
                        echo "No data found";
                        }

                ?>         
                </div>
            </div>
    </div>
    

    <!-- profile picture area end-->



    <!-- user name start-->
    <div class="container">
    <p class="profile-text"> <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?> </p> 
    </div>
    <!-- user name end-->


    <!--edit button-->
    <div class="container">
    <a href="edit.php"><button class="custom-button">Edit Profile</button></a>
    </div>
    <!--edit button end-->







    <div class="container">

   

   

    <?php

    $con = mysqli_connect("localhost", "root", "", "bookhub");
    if (mysqli_connect_errno()) 
    {
    die("Connection failed: " . mysqli_connect_error());
    }


   
    $query = "SELECT * FROM posts where user_id='$username'  ORDER BY create_at DESC ";  // ORDER BY create_at DESC 

    $result = mysqli_query($con, $query);



    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {   
    echo "<div class='post'>";
    $imageData = $row['content'];
    $imageType = $row['type'];

    echo "Date : ".$row['create_at']."<br><br>";


    ?>

            <form method='GET' action='postdelete.php'>        
            <input type="hidden" name="post_id" value="<?php echo $row['id']?>"> 

            <input type="submit" class="delete-button" value="Delete">
            </form>




            <br>











<?php

    echo '<img src="data:' . $imageType . ';base64,' . base64_encode($imageData) . '" width="200" height="350" style="border-radius: 10px; margin-left: 80px;">';

    echo "<br><br>";
   
    echo "<td>".$row['text1']."</td>";

   




    echo "</div>";



    }



    mysqli_close($con);

    ?>


</div>

       
    </div>
    </div>

 




    <!-- JS link -->
    <script src="/Assets/js/jquery.min.js"></script>
    <script src="/Assets/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- JS link END -->




    </body>
</html>