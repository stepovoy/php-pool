<?php
	if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['login'] && $_POST['passwd']) {
		if (!file_exists('../private/passwd'))
			mkdir("../private");
		$user = unserialize(file_get_contents('../private/passwd'));
		foreach ($user as $key => $value)
			if ($value['login'] == $_POST['login'])
				exit("ERROR\n");
		$user[] = array("login" => $_POST['login'], "passwd" => hash("md5", $_POST['passwd']));
		file_put_contents('../private/passwd', serialize($user));
		echo "OK\n";
	}
	else {
        header('Location: index.html');
		echo "ERROR\n";
	}
?>