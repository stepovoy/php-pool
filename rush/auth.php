<?php
	function auth($login, $passwd) {
        require_once('connect.php');
        if (!$login || !$passwd)
	            return false;
		$sql = "SELECT * FROM `users` WHERE `login` = '$login'";

		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if ($row['password'] == hash('md5', $passwd)) {
        		mysqli_close($conn);
                return true;
			}
		}
        mysqli_close($conn);
		return false;
	}
?>