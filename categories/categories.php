<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Navigation and Columns</title>
  <link rel="stylesheet" href="categories.css">

</head>
<body>
  <!-- Navigation Bar -->

 
  <header>
    
    <script src="/1CW/nav/nav.js"></script>
    
    <div id="contentPlaceholder"></div>

   
    </header>
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




<div class="container">




<div class="column" id="category-column">
      
  <ul class="categories">
        <li><a href="#" data-category="1">BOOKS</a></li>
        <li><a href="#" data-category="2">MAGAZINES</a></li>
        <li><a href="#" data-category="3">JOURNALS</a></li>
        <li><a href="#" data-category="4">COMICS</a></li>
        <li><a href="#" data-category="5">NEWS PAPERS</a></li>
  </ul>















</div>
<!--------------END 1ST COL--------------------->






<!--------------START 2ND COL------------------------------------------------------------------------------------------------------------------->
<div class="column" id="second-column">



  <div class="heading">
    <h2>READING CATEGORIES</h2>
  </div>


     <div class="column" id="text-column">

      <div id="content-category1" class="category-text">



        <div class="heading">
          <h2>BOOKS</h2>
        </div>


        <div class="images-container">
          <!-- First row of images -->
          <div class="image-item">




            <a href="type.php?category=Fiction">
            <img src="1_book_categories/book1.jpg" alt="Book 1"></a>
            <div class="image-description">Fiction</div>
            <div class='text'>Fiction</div>
          </div>

          <a href="type.php?category=Non-fiction">
          <div class="image-item">
            <img src="1_book_categories/book2.jpg" alt="Book 2"></a>
            <div class="image-description">Non-fiction</div>
         <div class='text'>Non-fiction</div>
          </div>

          <a href="type.php?category=Poetry">
          <div class="image-item">
            <img src="1_book_categories/book3.jpg" alt="Book 3"></a>
            <div class="image-description">Poetry</div>
            <div class='text'>Poetry</div>
          </div>

          <a href="type.php?category=Academic">
          <div class="image-item">
            <img src="1_book_categories/book4.jpg" alt="Book 4"></a>
            <div class="image-description">Academic</div>
            <div class='text'>Academic</div>
          </div>
      
          <!-- Second row of images -->
          <a href="type.php?category=Graphic Novels">
          <div class="image-item">
            <img src="1_book_categories/book5.jpg" alt="Book 5"></a>
            <div class="image-description">Graphic Novels</div>
            <div class='text'>Graphic Novels</div>
          </div>

          <a href="type.php?category=Religious">
          <div class="image-item">
            <img src="1_book_categories/book6.jpg"alt="Book 6"></a>
            <div class="image-description">Religious</div>
            <div class='text'>Religious</div>
          </div>

        


        </div>
      </div>



      <div id="content-category2" class="category-text" style="display: none;">

        <div class="heading">
          <h2>MAGAZINES</h2>
        </div>

        <div class="images-container">
          <!-- First row of images -->
          <div class="image-item">
            <img src="image1.jpg" alt="Book 1">
            <div class="image-description">Fashion and Lifestyle</div>
            <div class='text'>Fashion and Lifestyle</div>
          </div>
          <div class="image-item">
            <img src="image2.jpg" alt="Book 2">
            <div class="image-description">News and Current Affairs</div>
            <div class='text'>News and Current Affairs</div>
          </div>
          <div class="image-item">
            <img src="image3.jpg" alt="Book 3">
            <div class="image-description">Entertainment</div>
            <div class='text'>Entertainment</div>
          </div>
          <div class="image-item">
            <img src="image4.jpg" alt="Book 4">
            <div class="image-description"> Sports</div>
            <div class='text'>Sports</div>
          </div>
      
          <!-- Second row of images -->
       

          
        </div>







       
      </div>



      <div id="content-category3" class="category-text" style="display: none;">

        <div class="heading">
          <h2>JOURNALS</h2>
        </div>
        <div class="images-container">
          <!-- First row of images -->
          <div class="image-item">
            <img src="image1.jpg" alt="Book 1">
            <div class="image-description"> Academic Journals</div>
            <div class='text'> Academic Journals</div>
          </div>
          <div class="image-item">
            <img src="image2.jpg" alt="Book 2">
            <div class="image-description">Professional</div>
            <div class='text'>Professional</div>
          </div>
          <div class="image-item">
            <img src="image3.jpg" alt="Book 3">
            <div class="image-description"> Scientific Journals</div>
            <div class='text'> Scientific Journals</div>
          </div>
          <div class="image-item">
            <img src="image4.jpg" alt="Book 4">
            <div class="image-description"> Medival Journals</div>
            <div class='text'>Medival Journals</div>
          </div>
      
          <!-- Second row of images -->
       

          
        </div>
      </div>



      <div id="content-category4" class="category-text" style="display: none;">

        <div class="heading">
          <h2>COMICS</h2>
        </div>
        <div class="images-container">
          <!-- First row of images -->
          <div class="image-item">
            <img src="image1.jpg" alt="Book 1">
            <div class="image-description"> Superhero Comics</div>
            <div class='text'> Superhero Comics</div>
          </div>
          <div class="image-item">
            <img src="image2.jpg" alt="Book 2">
            <div class="image-description">Manga</div>
            <div class='text'>Manga</div>
          </div>
          <div class="image-item">
            <img src="image3.jpg" alt="Book 3">
            <div class="image-description">Graphic Novels</div>
            <div class='text'>Graphic Novels</div>
          </div>
          <div class="image-item">
            <img src="image4.jpg" alt="Book 4">
            <div class="image-description"> Webcomics</div>
            <div class='text'>Webcomics</div>
          </div>
      
          <!-- Second row of images -->
       

          
        </div>
      </div>



      <div id="content-category5" class="category-text" style="display: none;">

        <div class="heading">
          <h2>NEWS PAPERS</h2>
        </div>
        <div class="images-container">
          <!-- First row of images -->
          <div class="image-item">
            <img src="image1.jpg" alt="Book 1">
            <div class="image-description">Regional Newspapers</div>
            <div class='text'>Regional Newspapers</div>
          </div>
          <div class="image-item">
            <img src="image2.jpg" alt="Book 2">
            <div class="image-description"> National Newspapers</div>
            <div class='text'> National Newspapers</div>
          </div>
          <div class="image-item">
            <img src="image3.jpg" alt="Book 3">
            <div class="image-description"> International Newspapers</div>
            <div class='text'> International Newspapers</div>
          </div>
          <div class="image-item">
            <img src="image4.jpg" alt="Book 4">
            <div class="image-description">Student Newspapers</div>
            <div class='text'>Student Newspapers</div>
          </div>
      
          <!-- Second row of images -->
       

          
        </div>
      </div>

      </div>



  

















</div>
<!--------------END 2ND COL-------------------------------------------------------------------------------------------------------------------->

   





<!--------------START 3RD COL-------------------------------------------------------------------------------------------------------------------->
    <div class="column" id="third-column">
      <!-- Single Column Table with 4 Rows -->
 
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


































<!--------------END 3RD COL-------------------------------------------------------------------------------------------------------------------->     
    </div>
























  </div>

  <script src="script.js"></script>
 



</body>
</html>
