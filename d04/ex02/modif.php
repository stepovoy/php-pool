<?php
	if ($_POST['submit'] == "OK" && $_POST['submit'] && $_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && file_exists('../private/passwd')) {
		$user = unserialize(file_get_contents('../private/passwd'));
		foreach ($user as $key => $value)
			if ($value['login'] == $_POST['login'] && $value['passwd'] == hash("md5", $_POST['oldpw'])) {
				$user[$key]['passwd'] = hash("md5", $_POST['newpw']);
				file_put_contents('../private/passwd', serialize($user));
				exit("OK\n");
			}
	}
	echo "ERROR\n";
?>