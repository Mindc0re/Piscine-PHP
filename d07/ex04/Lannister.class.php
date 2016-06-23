<?php
	abstract class Lannister
	{
		function sleepWith($class)
		{
			if (is_a($class, "Tyrion"))
				print "Not even if I'm drunk !".PHP_EOL;
			if (is_a($class, "Jaime"))
				print "With pleasure, but only in a tower of Winterfell, then.".PHP_EOL;
		}
	}
?>