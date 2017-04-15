<?php
	require_once('connect.php');
	if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['login'] && $_POST['oldpw'] && $_POST['newpw']) {
		$sql = "SELECT uid, login, password FROM users WHERE login='" . $_POST['login'] . "'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if ($row['password'] == hash('md5', $_POST['oldpw'])) {
				$sql = "UPDATE users SET password='" . hash('md5', $_POST['newpw']) . "' WHERE login='" . $row['login'] . "'";
                mysqli_query($conn, $sql);
				echo "SUCCESS\n";
       			header('Location: login.php');
			}
			else
				echo "ERROR\n";
		}
		else
			echo "ERROR\n";
	}
?>
<html><body>
    <form action="modif.php" method="POST">
        Login: <input type="text" name="login" value="" />
        <br />
        Old password: <input type="password" name="oldpw" value="" />
        <br />
        New password: <input type="password" name="newpw" value="" />
        <br />
        <input type="submit" name="submit" value="OK" />
        <br />
    	<a href="login.php">Back to login</a>
    </form>
</body></html>