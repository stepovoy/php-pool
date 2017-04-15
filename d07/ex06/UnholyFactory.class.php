<?php
	class UnholyFactory {

		private $arr = array();

		public function absorb($fighter) {
			if (get_parent_class($fighter) == "Fighter") {
				if (isset($this->arr[$fighter->getName()])) {
					print("(Factory already absorbed a fighter of type " . $fighter->getName() . ")" . PHP_EOL);
					}
				else {
					$this->arr[$fighter->getName()] = $fighter;
					print("(Factory absorbed a fighter of type " . $fighter->getName() . ")" . PHP_EOL);
				}
			}
			else {
				print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
			}
		}

		public function fabricate($fighter) {
			if (array_key_exists($fighter, $this->arr)) {
				print("(Factory fabricates a fighter of type " . $fighter . ")" . PHP_EOL);
				return (clone $this->arr[$fighter]);
			}
			print("(Factory hasn't absorbed any fighter of type " . $fighter . ")" . PHP_EOL);
			return NULL;
		}
	}
?>