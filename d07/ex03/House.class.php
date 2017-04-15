<?php
	abstract class House {
		public function introduce() {
			print('House ' . $this->getHouseName() . ' of ' . $this->getHouseSeat() . ' : "' . $this->getHouseMotto() . '"' . PHP_EOL);
		}
		public abstract function getHouseName();
		public abstract function getHouseSeat();
		public abstract function getHouseMotto();
	}
?>