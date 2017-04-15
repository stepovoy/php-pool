#!/usr/bin/php
<?php
$file = fopen("php://stdin", "r;");
while ($file && !feof($file)) {
	echo "Enter a number: ";
	$num = fgets($file);
	if ($num){
		$num = str_replace("\n", "", $num);
		if (is_numeric($num)) {
			if($num % 2 == 0)
				echo "The number " . $num . " is even\n";
			else
				echo "The number " . $num . " is odd\n";
		}
		else
			echo "'" . $num . "' is not a number\n";
	}
}
fclose($file);
echo "\n";
?>