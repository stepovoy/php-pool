#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = $argv[1];
		$str = str_replace("+", " + ", $str);
		$str = str_replace("-", " - ", $str);
		$str = str_replace("*", " * ", $str);
		$str = str_replace("/", " / ", $str);
		$str = str_replace("%", " % ", $str);
		$arr = array_filter(explode(" ", $str));
		$first = $arr[0];
		$op = $arr[1];
		$second = $arr[2];
		if (($op === "+" || $op === "-" || $op === "*" || $op === "/" || $op === "%") && is_numeric($first) && is_numeric($second)) {
			if (($op === "/" || $op === "%") && $second == 0)
				;
			else if ($op === "+")
				echo $first + $second . "\n";
			else if ($op === "-")
				echo $first - $second . "\n";
			else if ($op === "*")
				echo $first * $second . "\n";
			else if ($op === "/")
				echo $first / $second . "\n";
			else if ($op === "%")
				echo $first % $second . "\n";
		}
		else
			echo "Syntax Error\n";
	}
	else
		echo "Incorrect Parameters\n";
?>