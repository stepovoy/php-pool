<?php
	class Tyrion extends Lannister {
		function sleepWith($x) {
			if ($x instanceof Jaime) {
				print("Not even if I'm drunk !" . PHP_EOL);
			}
			elseif ($x instanceof Sansa) {
				print("Let's do this." . PHP_EOL);
			}
			elseif ($x instanceof Cersei) {
				print("Not even if I'm drunk !" . PHP_EOL);
			}
		}
	}
?>