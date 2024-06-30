<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookhub";


$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];

    // Fetch comments for the given post_id from database
    $query = "SELECT * FROM comment WHERE post_id = $postId ORDER BY created_at DESC";
    $result = $connection->query($query);





    if ($result->num_rows > 0) {
        // Display comments
        while ($row = $result->fetch_assoc()) {

           
            ?>
            <div class="comment">
                <span class="comment-username"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> :</span>
                <span class="comment-content"><?php echo $row['content']; ?></span>
            </div>
    <?php

        }
    } else {
        echo "No comments found for this post.";
    }
} else {
    echo "No post_id provided";
}

$connection->close();


echo '
    <style>
    .comments-container {
       
    }

    .comment {
        margin-bottom: 10px;
    }

    .comment-username {
        font-weight: bold;
        color: #3366cc; /* Change the color as desired */
        margin-left:50px;
        
    }

    .comment-content {
        margin-left: 10px; /* Adjust as needed */
        color: #333; /* Change the color as desired */
    }
    </style>
    ';
?>
