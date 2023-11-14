<?php 
    $sname = "localhost";
    $unmae = "username";
    $password = "password";

    $db_name = "my_db";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);

    if (!$conn) {
        echo "Connectin Failed!";
        exit();
    }
?>
