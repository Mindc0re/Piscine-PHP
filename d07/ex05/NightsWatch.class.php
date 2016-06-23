<?php
	class NightsWatch
	{
		public $fighters = array();
		function recruit($character)
		{
			if (is_a($character, "IFighter"))
				$this->fighters[] = $character;
		}
		function fight()
		{
			foreach($this->fighters as $fighter)
				$fighter->fight();
		}
	}
?>