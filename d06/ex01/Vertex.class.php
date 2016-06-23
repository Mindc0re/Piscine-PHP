<?php
class Vertex
{
	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1.0;
	private $_color;

	public static $verbose = False;

	static function doc()
	{
		return file_get_contents("Vertex.doc.txt");
	}

	function __construct(array $kwargs)
	{
		if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs))
		{
			$this->_x = floatval($kwargs['x']);
			$this->_y = floatval($kwargs['y']);
			$this->_z = floatval($kwargs['z']);
			if (array_key_exists('w', $kwargs))
				$this->_w = floatval($kwargs['w']);
			if (array_key_exists('color', $kwargs))
				$this->_color = $kwargs['color'];
			else
			{
				$new_color = array('red' => 255, 'green' => 255, 'blue' => 255);
				$this->_color = new Color($new_color);
			}
		}
		if (self::$verbose === True)
			printf ('Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed' . PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		return ;
	}

	function __destruct()
	{
		if (self::$verbose === True)
			printf ('Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed' . PHP_EOL, $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
	}

	function __toString()
	{
		if (self::$verbose === True)
			return sprintf ('Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, Color( red: %3d, green: %3d, blue: %3d ) )', $this->_x, $this->_y, $this->z_, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		else
			return sprintf ('Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f )', $this->_x, $this->y, $this->z, $this->_w);
	}

}

?>