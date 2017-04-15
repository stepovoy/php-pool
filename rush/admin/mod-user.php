<?php
	require_once('../connect.php');
    require_once('isadmin.php');
	if (isadmin($_POST['name'])) {
		if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['login'] && ($_POST['newlogin'] || $_POST['newpw'])) {
			$sql = "SELECT uid, login, password FROM users WHERE login='" . $_POST['login'] . "'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				if ($_POST['newlogin'])
					$sql = "UPDATE users SET login='" . $_POST['newlogin'] . "' WHERE login='" . $row['login'] . "'";
				else if ($_POST['newpw'])
					$sql = "UPDATE users SET password='" . hash('md5', $_POST['newpw']) . "' WHERE login='" . $row['login'] . "'";
	            mysqli_query($conn, $sql);
				echo "SUCCESS\n";
	   			header('Location: index.php');
			}
			else
				echo "ERROR\n";
		}
	?>
	<html><body>
	    <form action="mod-user.php" method="POST">
	        Login: <input type="text" name="login" value="" />
	        <br />
	        New login: <input type="text" name="newlogin" value="" />
	        <br />
	        New password: <input type="password" name="newpw" value="" />
	        <br />
	        <input type="submit" name="submit" value="OK" />
	        <br />
	    	<a href="index.php">Back to admin</a>
	    </form>
	</body></html>
	<?php
	}
    else
        echo 'You are not admin. <a href="../index.php">Click here</a> to go to the shop';
?>