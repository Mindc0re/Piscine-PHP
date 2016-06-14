<?PHP
	function tri(&$tab)
	{
		$check = 0;
		$i = 0;
		$next = 1;
		$tmp;

		while ($tab[$i])
		{
			if ($tab[$next])
			{
				if (strcmp($tab[$i], $tab[$next]) > 0)
				{
					$tmp = $tab[$i];
					$tab[$i] = $tab[$next];
					$tab[$next] = $tmp;
					$check++;
				}
			}
			$i++;
			$next++;
		}
		if ($check > 0)
			tri($tab);
		return ($tab);
	}

	function ft_split($str)
	{
		if (!is_string($str))
			return NULL;
		$i = 0;
		$j = 0;
		$check = 0;
		$tab = array();
		$tmp = explode(" ", $str);
		foreach ($tmp as $key) 
		{
			if ($key)
			{
				$tab[$j] = $tmp[$i];
				$j++;
			}
			$i++;
		}
		tri($tab);
		return ($tab);
	}
?>