<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "111111";
    $db_name = "shop";
    $db_port = "8080";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
    if (!$conn)
        die('Connection error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
?>