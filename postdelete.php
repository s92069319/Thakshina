<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookhub";

$id = $_GET['post_id'];


$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$query = "DELETE FROM posts WHERE id ='$id'";

if (mysqli_query($con, $query)) {
  
    echo '<style>
            .popup {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 10px;
                background-color: #f3f3f3;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                z-index: 1000;
            }
          </style>';

    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                const popup = document.createElement("div");
                popup.classList.add("popup");
                popup.textContent = "Post successfully deleted";
                document.body.appendChild(popup);
                setTimeout(function() {
                    document.body.removeChild(popup);
                    window.location.href = "profile.php";
                }, 1000); // Popup will disappear after 1 seconds (2000 milliseconds)
            });
          </script>';
} else {
    echo "Error: " . $id;
}


$con->close();
?>
