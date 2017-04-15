<?php
	session_start();
	function isadmin() {
		require('../connect.php');
		$sql = "SELECT * FROM users";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
		        if ($row['login'] == $_SESSION['loggued_on_user'] && $row['admin'] == 1) {
    				mysqli_close($conn);
					return true;
		        }
		    }
		}
		mysqli_close($conn);
		return false;
	}
?>