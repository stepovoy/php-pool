<?php
	require_once('../connect.php');
    require_once('isadmin.php');
	if (isadmin($_POST['name'])) {
		if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['login']) {
			$sql = "SELECT uid, login FROM users";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
			        if ($row['login'] == $_POST['login']) {
						$sql = "DELETE FROM users WHERE login='" . $row['login'] . "'";
						mysqli_query($conn, $sql);
						echo "SUCCESS<br/>";
			        	header('Location: index.php');
	        			mysqli_close($conn);
			        	break;
			        }
			    }
			}
		}
	?>
	<html><body>
	    <form action="del-user.php" method="POST">
	        Login: <input type="text" name="login" value="" />
	        <br />
	        <input type="submit" name="submit" value="OK" />
	        <br />
	    	<a href="index.php">Back to login</a>
	    </form>
	</body></html>
	<?php
	}
    else
        echo 'You are not admin. <a href="../index.php">Click here</a> to go to the shop';
?>