#!/usr/bin/php
<?php
	if ($argc == 4)
	{
		$first = trim($argv[1]);
		$op = trim($argv[2]);
		$second = trim($argv[3]);

		if ($op === "+" || $op === "-" || $op === "*" || $op === "/" || $op === "%") {
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
	}
	else
		echo "Incorrect Parameters\n";
?>