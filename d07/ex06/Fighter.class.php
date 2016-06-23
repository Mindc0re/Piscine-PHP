<?php
	abstract class Fighter
	{
		public $type;

		function __construct($string)
		{
			if ($string === "foot soldier")
				$this->type = $string;
			if ($string === "archer")
				$this->type = $string;
			if ($string === "assassin")
				$this->type = $string;
		}

		abstract function fight($target);
	}
?>