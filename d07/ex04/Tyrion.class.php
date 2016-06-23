<?php
	class Tyrion extends Lannister
	{
		public function sleepWith($class)
		{
			if (is_a($class, "Jaime"))
				print "Not even if I'm drunk !".PHP_EOL;
			else if (is_a($class, "Sansa"))
				print "Let's do this.".PHP_EOL;
			else if (is_a($class, "Cersei"))
				print "Not even if I'm drunk !".PHP_EOL;
		}
	}
?>