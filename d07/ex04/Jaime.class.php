<?php
	class Jaime extends Lannister
	{
		function sleepWith($class)
		{
			if (is_a($class, "Cersei"))
				print "With pleasure, but only in a tower Winterfell, then.".PHP_EOL;
			if (is_a($class, "Tyrion"))
				print "Not even if I'm drunk !".PHP_EOL;
			if (is_a($class, "Sansa"))
				print "Let's do this.".PHP_EOL;
		}
	}
?>