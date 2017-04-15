<?php
	require_once('connect.php');
	if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['login'] && $_POST['passwd']) {
		$sql = "SELECT uid, login, password FROM users";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
		        if ($row['login'] == $_POST['login'] && $row['password'] == hash('md5', $_POST['passwd'])) {
					$sql = "DELETE FROM users WHERE login='" . $row['login'] . "'";
					mysqli_query($conn, $sql);
					echo "SUCCESS<br/>";
		        	header('Location: login.php');
        			mysqli_close($conn);
		        	break;
		        }
		    }
		}
	}

?>
<html><body>
    <form action="delete.php" method="POST">
        Login: <input type="text" name="login" value="" />
        <br />
        Password: <input type="password" name="passwd" value="" />
        <br />
        <input type="submit" name="submit" value="OK" />
        <br />
    	<a href="login.php">Back to login</a>
    </form>
</body></html>