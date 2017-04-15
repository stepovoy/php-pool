#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$arr = array_filter(explode(" ", $str));
		sort($arr);
		return $arr;
	}

	if ($argc > 1) {
		for ($i = 0; $i < $argc; $i++) {
			$str .= trim(preg_replace('/\s\s+/', ' ', $argv[$i + 1])) . " ";
		}
	}
	$arr = ft_split($str);
	foreach ($arr as &$item)
		echo $item . "\n";
?>