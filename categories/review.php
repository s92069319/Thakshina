<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Two Column Layout</title>
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="rating.css">


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



  while ($row = $result->fetch_assoc()) {
    echo "<img src='data:" . $row["ptype"] . ";base64," . base64_encode($row["pcontent"]) . "' width='70' height='70' style='border-radius: 100px; border: 2px solid #000; margin-left: 40px;'>";

         
  }

} else {
  echo "No data found";
}

?>          <?php
echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; 


?>



  <!-- Container with left and right sections -->
  <div class="container">
    <!-- Left Section -->
    <div class="left-section">
      <!-- Content for left section -->
  




      <?php



        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bookhub";
        

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        if (isset($_GET['id']))
         {
            $id = $_GET['id'];
           


        $query = "SELECT * FROM documents where rdid='$id'";
        $result = mysqli_query($conn, $query);


        echo "<table>";


        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          
            $imageData = $row['content'];
            $imageType = $row['type'];


            echo "<tr>";
            echo "<td>";
            echo '<img src="data:' . $imageType . ';base64,' . base64_encode($imageData) . '" width="250" height="350" style="border-radius: 10px;">';
            echo "</td>";
            
           

            echo "<tr>";
            echo "<td> Categories : " . $row['categories'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td> Types : " . $row['readingtypes'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td> Name of Book : " . $row['matname'] . "</td>";
        
            echo "</tr>";
            
            
            echo "<tr>";
            echo "<td> <button class='download-button'>Download File</button></td>";   
            echo "</tr>";


            $_SESSION['matname'] = $row['matname'];

               
        
            
        }

    }


    else {
        echo 'Invalid ID';
    }


        echo "</table>";

        
        ?>


    </div>
  



    
    <!-- Right Section -->
    <div class="right-section">
      <h2>RATING AND REVIEWS HERE</h2>  


      



      <p>4032 RATINGS  324 REVIEWS</p> 




      <div class="rating-form">
        <h2>Rate the Book</h2>


        <form id="ratingForm" action="submit_rating.php" method="post">

        
            <label for="name">Review</label>

            <input type="hidden" name="matname" value="<?php echo htmlspecialchars($_SESSION['matname']); ?>">


            <input type="hidden" name="book_id" value="<?php echo $row['id']?>"> 

            <input type="text" id="name" name="name" required>
            
            <label for="rating">Rating:</label>
            <div class="rating-stars" id="ratingStars">
                <input type="hidden" name="rating" id="ratingValue" value="0">
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
            </div><br><br>

            
            
            <input type="submit" value="Post Review" class="review-button">

            
        </form>
    </div>

<br>
<?php
    

  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookhub";
    

    $conn = new mysqli($servername, $username, $password, $dbname);
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['matname'])) 
    {
    $matname = $_GET['matname'];


    $sql = "SELECT firstname, lastname, name FROM ratings WHERE matname='$matname'  ORDER BY id DESC ";
                $result = mysqli_query($conn, $sql);


                if ($result && mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                echo "" . $row["firstname"] . " ";
                echo "" . $row["lastname"] . "";
                echo " : " . $row["name"] . "<br>";
     
                echo "<hr>"; 
                }

                } else {
                echo "No results found";
                }

    } 
    
    else 
    {
                echo "No matname value provided in the URL";
    }



?>








    </div>
  </div>



  


  <script>
        document.addEventListener("DOMContentLoaded", function () {
            const stars = document.querySelectorAll(".star");
            const ratingValue = document.getElementById("ratingValue");

            stars.forEach((star) => {
                star.addEventListener("mouseover", function () {
                    const rating = this.getAttribute("data-rating");
                    ratingValue.value = rating;

                    stars.forEach((s) => {
                        s.classList.remove("active");
                    });

                    for (let i = 0; i < rating; i++) {
                        stars[i].classList.add("active");
                    }
                });

                star.addEventListener("click", function () {
                    const rating = this.getAttribute("data-rating");
                    ratingValue.value = rating;
                });

                star.addEventListener("mouseout", function () {
                    const currentRating = ratingValue.value;

                    stars.forEach((s, index) => {
                        if (index < currentRating) {
                            s.classList.add("active");
                        } else {
                            s.classList.remove("active");
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
