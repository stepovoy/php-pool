<?php
function auth($login, $passwd) {
	if (!$login || !$passwd)
            return false;
	$user = unserialize(file_get_contents('../private/passwd'));
	foreach ($user as $key => $value)
		if ($value['login'] == $login && $value['passwd'] == hash("md5", $passwd))
			return true;
	}
	return false;
?>