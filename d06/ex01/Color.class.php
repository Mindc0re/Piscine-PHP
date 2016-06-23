<?php
class Color
{
	public $red;
	public $green;
	public $blue;

	public static $verbose = false;

	static function doc()
	{
		return file_get_contents("Color.doc.txt");
	}

	function __construct(array $kwargs)
	{
		if (array_key_exists('rgb', $kwargs))
			{
				$this->red = (intval($kwargs['rgb']) & 0xFF0000) >> 16;
				$this->green = (intval($kwargs['rgb']) & 0x00FF00) >> 8;
				$this->blue = (intval($kwargs['rgb']) & 0x0000FF);
			}
		else
		{
			if (array_key_exists('red', $kwargs))
				$this->red = intval($kwargs['red']);
			else
				$this->red = 0;
			if (array_key_exists('green', $kwargs))
				$this->green = intval($kwargs['green']);
			else
				$this->green = 0;
			if (array_key_exists('blue', $kwargs))
				$this->blue = intval($kwargs['blue']);
			else
				$this->blue = 0;
		}
		if (self::$verbose === true)
			printf ('Color( red: %3d, green: %3d, blue: %3d ) constructed.' . PHP_EOL, $this->red, $this->green, $this->blue);
		return;
	}

	function __destruct()
	{
		if (self::$verbose === true)
			printf ('Color( red: %3d, green: %3d, blue: %3d ) destructed.' . PHP_EOL, $this->red, $this->green, $this->blue);
	}

	function __toString()
	{
		return sprintf('Color( red: %3d, green: %3d, blue: %3d )', $this->red, $this->green, $this->blue);
	}

	function add(Color $to_add)
	{
		$new_rgbadd = array('red' => $this->red + $to_add->red, 'blue' => $this->blue + $to_add->blue, 'green' => $this->green + $to_add->green);
		return new Color($new_rgbadd);
	}

	function sub(Color $to_sub)
	{
		$new_rgbsub = array('red' => $this->red - $to_sub->red, 'blue' => $this->blue - $to_sub->blue, 'green' => $this->green - $to_sub->green);
		return new Color($new_rgbsub);
	}

	function mult($f)
	{
		$new_rgbmult = array('red' => $this->red * $f, 'blue' => $this->blue * $f, 'green' => $this->green * $f);
		return new Color($new_rgbmult);
	}
}

?>