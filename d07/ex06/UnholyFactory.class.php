<?php
	class UnholyFactory
	{
		private $_absorbedFighters = array();

		function absorb($class)
		{
			if (is_a($class, "Fighter"))
			{
				foreach ($this->_absorbedFighters as $exists) 
				{
					if ($exists === $class->type)
					{
						print "(Factory already absorbed a fighter of type ".$class->type.")".PHP_EOL;
						return;
					}
				}
				print "(Factory absorbed a fighter of type ".$class->type.")".PHP_EOL;
				$this->_absorbedFighters[] = $class->type;
			}
			else
				print "(Factory can't absorb this, it's not a fighter)".PHP_EOL;
		}

		function fabricate($type)
		{
			foreach($this->_absorbedFighters as $exists)
			{
				if ($type === $exists)
				{
					print "(Factory fabricates a fighter of type ".$exists.")".PHP_EOL;
					return ($type === "foot soldier" ? new Footsoldier() : ($type === "archer" ? new Archer() : ($type === "assassin" ? new Assassin() : 0)));
				}
			}
			print "(Factory hasn't absorbed any fighter of type ".$type.")".PHP_EOL;
			return;
		}
	}
?>