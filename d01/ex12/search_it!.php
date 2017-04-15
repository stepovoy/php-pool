#!/usr/bin/php
<?php
	if ($argc > 2) {
		for ($i = 2; $i < $argc; $i++)
		{
			$tmp = array_filter(explode(":", $argv[$i]));
			$key = $tmp[0];
			$value = $tmp[1];
			if (!$key && $value)
				$key = "0";
			$arr[$key] = $value;
		}
		foreach ($arr as $key => $value) {
			if ($argv[1] == "0" && $key == "0")
				echo $value . "\n";
			else if ($key == $argv[1] && $key != "0")
				echo $value . "\n";
		}
	}
?>