#!/usr/bin/php
<?php
	if ($argc == 2) {
		$str = trim(preg_replace('/\s\s+/', ' ', $argv[1]));
		echo $str;
	}
	echo "\n";
?>