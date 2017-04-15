#!/usr/bin/php
<?php
	function ft_split($str)
	{
		return array_filter(explode(" ", $str));
	}

	$str = ft_split(trim(preg_replace('/\s\s+/', ' ', $argv[1])) . " ");
	foreach (array_reverse($str) as &$item) {
		echo $item;
		if ($item != reset($str))
			echo " ";
	}
	echo "\n";
?>