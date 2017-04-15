<?php
	require_once('connect.php');
	if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['login'] && $_POST['passwd']) {
		$match = 0;
		$sql = "SELECT uid, login FROM users";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
		        if ($row['login'] == $_POST['login']) {
					echo "User exists already<br/>";
		        	$match = 1;
		        	break;
		        }
		    }
		}
		if (!$match) {
			$sql = "INSERT INTO users (login, password)
			VALUES ('" . $_POST['login'] . "', '" . hash('md5', $_POST['passwd']) . "')";
			mysqli_query($conn, $sql);
			echo "SUCCESS<br/>";
        	header('Location: login.php');
        	mysqli_close($conn);
		}
	}

?>
<html><body>
    <form action="create.php" method="POST">
        Login: <input type="text" name="login" value="" />
        <br />
        Password: <input type="password" name="passwd" value="" />
        <br />
        <input type="submit" name="submit" value="OK" />
        <br />
    	<a href="login.php">Back to login</a>
    </form>
</body></html>