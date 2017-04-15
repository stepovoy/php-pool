<?php
	if ($_GET['action'] && $_GET['name'])
	{
		if ($_GET['action'] == 'set' && $_GET['value'])
			setcookie($_GET['name'], $_GET['value'], time() + 3600);
		elseif ($_GET['action'] == 'get') {
			if ($_COOKIE[$_GET['name']])
				echo $_COOKIE[$_GET['name']] . "\n";
		}
		elseif ($_GET['action'] == 'del') {
			setcookie($_GET['name'], NULL, -1);
		}
	}
?>