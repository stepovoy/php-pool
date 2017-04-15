#!/usr/bin/php
<?php
	if ($argc == 2) {
		date_default_timezone_set("Europe/Paris");
		$week_arr = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
		$month_arr = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
		$arr = array_filter(explode(" ", $argv[1]));
		$week = $arr[0];
		$day = $arr[1];
		$month = strtolower($arr[2]);
		$year = $arr[3];
		$time = array_filter(explode(":", $arr[4]));
		$hour = $time[0];
		$minute = $time[1];
		$second = $time[2];
		if (is_numeric($day) && is_numeric($year) && is_numeric($hour) && is_numeric($minute) && is_numeric($second) && is_string($month) && strlen($day) < 3 && strlen($day) > 0 && strlen($year) == 4 && strlen($hour) == 2 && strlen($minute) == 2 && strlen($second) == 2) {
			foreach ($month_arr as $key => $value)
				if ($month == $value)
					$month = $key + 1;
			if (is_numeric($month))
				echo mktime($hour, $minute, $second, $month, $day, $year) . "\n";
		}
		else
			echo "Wrong Format\n";
	}
?>