<?php include('server.php'); ?>
<?php include('mainconfig.php'); ?>

<?php


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
  <title>Like and Dislike system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



  <link rel="stylesheet" href="main.css">

  
  <link rel="stylesheet" href="report.css">

  <link rel="stylesheet" href="index.css">

  <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Lk1dTj+F7u4+uwJ+FLhUSvhEZfS8/z6JRliP//cgXYD5NvJ+p2JAb5qQTOJp+uB7kM1JZw6gz2SCMZLjpxalLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  
    


</head>

<body>
<div id="contentPlaceholder"></div>













<!------------------------1ST COL START HERE---------------------------------------------------------------------------------------->



<?php



?>










<br>
<?php 

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



<!--   1ST COL END DIV TAG---->
<!------------------------1ST COL END HERE---------------------------------------------------------------------------------------->





<!----------------------------------------------------DIV MID COL START------------------------------------------------------------------->



 <!-- START uploaded image -->
<center>
<div class='box'>

<?php if (isset($image_path)): ?>
<img src="<?php echo $image_path; ?>" alt="Profile Image">
<?php endif; ?>


<script>
        function showSuccessMessage() {
            alert("Success! Your post has been added.");
        }

        function showSuccessComment() {
          alert("Comment Successfully Added.");
          
        }

        function showSuccessReport() {
          alert("Report Successfully Added.");
          
        }


      
   
        
    </script>



<form action="img.php" method="post" enctype="multipart/form-data" onsubmit="showSuccessMessage()">

<br>
        <input type ="textarea"  placeholder="      Share your READS"  class="textarea1" name="text1" required>

        <label for="file-upload" class="custom-file-upload" >
      
        <input type="file" name="image" id="image" required>
        </label>  

        <hr>
    
      
        <input type="submit" name="submit" class="uploadbutton" value="Upload Image">

        <br><br>

  
</form>
</div>
</center>
<!-- END uploaded image -->

















     <?php 

$con = mysqli_connect("localhost", "root", "", "bookhub");
if (mysqli_connect_errno()) 
{
    die("Connection failed: " . mysqli_connect_error());
}
              $query = "SELECT username,content,post_id FROM comment";  

              
              $result1 = mysqli_query($con, $query);




        ?>

   

<?php 

$sql = "SELECT id,user_id,text1,name,type,content,create_at,post_id FROM posts ORDER BY create_at DESC"; 

$result = $conn->query($sql);

?>







  <div class="posts-wrapper">


   <?php foreach ($posts as $post): ?>
        









    
    <div class="post">

   <div class="postid">       POST ID <?php echo $post['id']; ?> </div>
          

   <!--pop up window-->
  

   <button class="reportBtn">Report</button>


<div id="popupForm" class="form-popup">

<form class="form-container" action="report.php" method="post" onsubmit="showSuccessReport()">

    <h2>Report Here !</h2>

    <div class="">Post ID</div>
    <input type="text" name='post_id' id="input1" required><br><br>

    <hr>

    <div class="">Report Categories</div>

    
    Voilence   :  <input type="radio" name="report_title" id="radio1" value="Voilence" required><br>
    Spam       :  <input type="radio" name="report_title" id="radio2" value="Spam"><br>
    Other      :  <input type="radio" name="report_title" id="radio3" value="Other"><br>
     

    <hr>

 
    <div class="">Post || Comment</div>

    Post     :  <input type="radio" name="post_comment" id="radio4" value="Post" required><br>
    Comment  :  <input type="radio" name="post_comment" id="radio5" value="Comment"><br>
       
    
    <hr>


    <div class="">Report Message</div>
    <input type="text" name="report_message" id="input2" required><br><br>



    <hr>



    <button type="button" value="Clear" type="reset" id="clearBtn">Clear</button>
    <button type="submit" id="submitBtn">Submit</button>
    <button type="button" id="closeForm">Close</button>



</form>
</div>


   <!--pop up window end-->








         

          <!--start post infromation-->   

         
          <br>
          <img src="1.png" alt="Profile Picture" class="profile-picture">



  














          <div class="userfullname">     <?php echo $post['firstname']; ?> <?php echo $post['lastname']; ?>
          </div>  
          <br>

          <div class="postdate">     Date : <?php echo $post['create_at']; ?> 
          </div><br>

          <div class="review">     <?php echo $post['text1']; ?> 
          </div><br><br>

        
          <!--end post infromation-->




        <div> 

     

        </div>




        <!-- testing purpose area-->

        <center>
   

<?php
        
    if ($result->num_rows > 0) 
    
    {
    $row = $result->fetch_assoc();
    $imageData = $row['content'];
    $imageType = $row['type'];


    // Displaying the image
    echo '<img src="data:' . $imageType . ';base64,' . base64_encode($imageData) . '" width="200" height="350" style="border-radius: 10px; margin-left: 0px;">';
 

    }


    else 
    {
    echo "No image found";  
    }

    ?>



</center>





         <!-- testing purpose end area-->




           
<!--------------------------------------------------------------LIKE SECTION-------------------------------------------------------------->




     <br>
       <hr>

       <div class="left-like">
      <div class="post-info">



    
        

        <!-- testing area-------------------->

    <!-- if user likes post, style button differently -->
    <i <?php if (userLiked($post['id'])): ?>
                  class="fa fa-thumbs-up like-btn"
          <?php else: ?>
                  class="fa fa-thumbs-o-up like-btn"
          <?php endif ?>
          data-id="<?php echo $post['id'] ?>"></i>
        <span class="likes"><?php echo getLikes($post['id']); ?></span>
        
        &nbsp;&nbsp;&nbsp;&nbsp;




            <!-- if user dislikes post, style button differently -->
        <i 
          <?php if (userDisliked($post['id'])): ?>
                  class="fa fa-thumbs-down dislike-btn"
          <?php else: ?>
                  class="fa fa-thumbs-o-down dislike-btn"
          <?php endif ?>
          data-id="<?php echo $post['id'] ?>"></i>
        <span class="dislikes"><?php echo getDislikes($post['id']); ?></span> 

        




      <div class="text-like">

            Likes
          </div>


          <?php 



          ?>



  <!-- testing area-------------------->

</div></div>
      <hr>
      
        



<!--------------------------------------------------------------LIKE SECTION END-------------------------------------------------------------->







<!-- COMMENT SECTION CODE START------------------------------------------------------------------------------------------------------->



        


          

            <form action="comment.php" method="post" class="comment-form" onsubmit="showSuccessComment()">
            <input type="text" name="content" class="comment-input">     
                    
            <input type="hidden" name="post_id" value="<?php echo $row['id']?>"> 
            <input type="submit" class="comment-btn"  value="Post Comment" >
            </form>


            

          


<!-- COMMENT SECTION CODE END------------------------------------------------------------------------------------------------------->







<!--------COMMNENT VIEW------------------------------------------------------------------------------------------------------------->








<?php



echo "<button class='show-comment' data-postid='" . $row['post_id'] . "'>View Comments</button>";
echo "<div class='comment-section' id='comment-" . $row['post_id'] . "'></div>";

?>

<!--------COMMNENT VIEW------------------------------------------------------------------------------------------------------------->


</div>


      </div>
  </div>


    <?php endforeach ?>

   

  </div>


     <!--- 2ND COL END DIV TAG--->
<!----------------------------------------------------DIV MID COL END------------------------------------------------------------------->



<!----------------------------------------------------DIV 3RD COL START------------------------------------------------------------------->



















<!----------------------------------------------------DIV 3RD COL END------------------------------------------------------------------->







  <script>
document.addEventListener("DOMContentLoaded", function () {
        const showCommentButtons = document.querySelectorAll(".show-comment");

        showCommentButtons.forEach(button => {
            button.addEventListener("click", function () {
                const postId = this.getAttribute("data-postid");
                const commentSection = document.getElementById(`comment-${postId}`);
                
                if (commentSection.style.display === "block") {
                    commentSection.style.display = "none";
                    button.textContent = "View More Comments";
                } else {
                    fetchComments(postId)
                        .then(response => response.text())
                        .then(data => {
                            commentSection.innerHTML = data;
                            commentSection.style.display = "block";
                            button.textContent = "Hide Comments";
                        });
                }
            });
        });

        // Function to fetch comments for a given post_id
        function fetchComments(postId) {
            return fetch(`get_comments.php?post_id=${postId}`);
        }
    });
</script>


  <script src="report.js"></script>
  <script src="scripts.js"></script>

  <script>

    fetch('nav.php')
      .then(response => response.text())
      .then(html => {
        document.getElementById('contentPlaceholder').innerHTML = html;
      })
      .catch(error => {
        console.error('Error fetching content:', error);
      });
  </script>
</body>
</html>