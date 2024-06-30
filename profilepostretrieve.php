<?php


$con = mysqli_connect("localhost", "root", "", "bookhub");

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION['username'];


if (isset($_POST["submit"])) {
    $file = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];

    $content = file_get_contents($file);
    $content = mysqli_real_escape_string($con, $content);

  


    // Insert both image and text into 'posts' table
    $query = "INSERT INTO posts (user_id,text1,name, type, content) VALUES ( '$username','$text','$fileName', '$fileType', '$content')";

    if (mysqli_query($con, $query)) {
        echo "Record inserted successfully";
        header('Location: index.php'); // Redirect to index.php after successful insertion
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}

$con->close();
?>












