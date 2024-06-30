<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "bookhub");

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$text = $_POST["text1"];
$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];





if (isset($_POST["submit"])) {
    $file = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];

    $content = file_get_contents($file);
    $content = mysqli_real_escape_string($con, $content);

    // Insert both image and text into 'posts' table
    $query = "INSERT INTO posts (user_id, firstname, lastname, text1, name, type, content) VALUES ('$username','$firstname','$lastname','$text','$fileName', '$fileType', '$content')";

    if (mysqli_query($con, $query)) {



        // Retrieve the last inserted ID
        $lastInsertedID = mysqli_insert_id($con);

        // Update the post_id column with the last inserted ID
        $updateQuery = "UPDATE posts SET post_id = '$lastInsertedID' WHERE id = '$lastInsertedID'";
        if (mysqli_query($con, $updateQuery)) {
          
            header('Location: index.php'); // Redirect to index.php after successful insertion
        } else {
            echo "Error updating post_id: " . mysqli_error($con);
        }


    } 
    
    
    
    else {
        echo "Error inserting record: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>