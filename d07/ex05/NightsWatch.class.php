<?php
	class NightsWatch implements IFighter {
		private $arr = array();
		public function recruit($x) {
			$this->arr[] = $x;
		}
		function fight() {
			foreach ($this->arr as $fighter) {
				if (method_exists($fighter, 'fight')) {
					$fighter->fight();
				}
			}
		}
	}
?>