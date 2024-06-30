<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "bookhub"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $emailadd = $_POST["emailadd"];

    // Copy emailadd value to username
    $username = $emailadd;

    $profile_picture_name = $_FILES["profile_picture"]["name"];
    $profile_picture_tmp = $_FILES["profile_picture"]["tmp_name"];
    $profile_picture_type = $_FILES["profile_picture"]["type"];
    $profile_picture_content = file_get_contents($profile_picture_tmp);

    $cover_photo_name = $_FILES["cover_photo"]["name"];
    $cover_photo_tmp = $_FILES["cover_photo"]["tmp_name"];
    $cover_photo_type = $_FILES["cover_photo"]["type"];
    $cover_photo_content = file_get_contents($cover_photo_tmp);

    $sql = "INSERT INTO login (password, firstname, lastname, emailadd, username, pname, ptype, pcontent, cname, ctype, ccontent) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssssssssss",
        $password,
        $firstname,
        $lastname,
        $emailadd,
        $username, // Bind the $username variable here
        $profile_picture_name,
        $profile_picture_type,
        $profile_picture_content,
        $cover_photo_name,
        $cover_photo_type,
        $cover_photo_content
    );

    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
