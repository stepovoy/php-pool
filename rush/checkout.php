<?php
    session_start();
    require_once('connect.php');
    if ($_SESSION['loggued_on_user']) {
        if ($_SESSION['orders'] && $_GET['submit'] == "Checkout") {
            $sql = "INSERT INTO orders (sum, user)
            VALUES ('" . $_SESSION['sum'] ."', '" . $_SESSION['loggued_on_user'] . "')";
            
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully <br />";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        	$_SESSION['orders'] = NULL;
            $_SESSION['sum'] = NULL;
            echo 'Your order was placed successfully. <a href="index.php">Go to the homepage</a>';
        }
    }
    else
    	echo 'You are not logged in. To make purchases please <a href="login.php">log in</a> first.';
?>
