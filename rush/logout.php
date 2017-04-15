<?php
	session_start();
	session_destroy();
	$_SESSION['loggued_on_user'] = "";
	header('Location: index.php');
?>