#!/usr/bin/php
<?php
	function ft_is_sort($arr)
	{
		$old = $arr;
		sort($arr);
		return ($old === $arr);
	}
?>