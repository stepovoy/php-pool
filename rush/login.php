<?php
	require_once('auth.php');
	session_start();
	if ($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd'])) {
		$_SESSION['loggued_on_user'] = $_POST['login'];
		echo "SUCCESS\n";
        header('Location: index.php');
	}
	else
		$_SESSION['loggued_on_user'] = "";
?>
<html><body>
    <form action="login.php" method="POST">
        Login: <input type="text" name="login" value="" />
        <br/>
        Password: <input type="password" name="passwd" value="" />
        <br/>
        <input type="submit" name="submit" value="OK" />
    </form>
    <a href="create.php">Create an account</a>
    <br />
    <a href="modif.php">Change your password</a>
    <br />
    <a href="delete.php">Delete your account</a>
    <br />
    <a href="index.php">Back to shopping</a>
</body></html>