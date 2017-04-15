<?php
// the delete.php file removes a TO DO from the CSV.

foreach ($_GET as $key => $value) {
	$file = file_get_contents('list.csv');
	$arr = explode("\n", $file);
		// var_dump($arr);
	// print_r($arr);
	foreach ($arr as $v) {
		$tmp = explode(";", $v);
		if ($tmp[1] == $value) {
			$line = $tmp[1] . ";" . $tmp[1] . "\n";
			$file = str_replace($line, '', $file);
			file_put_contents('list.csv', $file);
		}
	}
}
?>