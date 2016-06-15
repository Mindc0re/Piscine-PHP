#!/usr/bin/php
<?PHP
	function ft_isalpha($char, $type)
	{
		if ($type == 0)
		{
			if (($char >= 'a' && $char <= 'z') || ($char >= 'A' && $char <= 'Z'))
				return (1);
		}
		else if ($type == 1)
		{
			if ($char >= '0' && $char <= '9')
				return (1);
		}
		return (0);
	}
	
	function ft_strisalpha($str, $type)
	{
		$i = 0;
		if ($type == 0)
		{
			while ($str[$i])
			{
				if (!ft_isalpha($str[$i], $type))
					return (0);
				else
					$i++;
			}
		}
		else if ($type == 1)
		{
			while ($str[$i])
			{
				if (!ft_isalpha($str[$i], $type))
					return (0);
				else
					$i++;
			}
		}
		return (1);
	}

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
				if (strcmp(strtoupper($tab[$i]), strtoupper($tab[$next])) > 0)
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

	function reject_prog_name($argv)
	{
		$tab = array();
		$i = 0;
		foreach ($argv as $key) 
		{
			if ($key && strcmp($key, "ssap2.php") && strcmp($key, "./ssap2.php"))
			{
				$tab[$i] = $key;
				$i++;
			}
		}
		return $tab;
	}

	function display_in_order($tab)
	{
		$i = 0;
		$tmp = array();
		foreach ($tab as $key)
		{
			if (ft_strisalpha($key, 0))
				print("$key\n");
			else
			{
				$tmp[$i] = $key;
				$i++;
			}
		}
		$tab = array();
		$i = 0;
		foreach ($tmp as $key)
		{
			if (ft_strisalpha($key, 1))
				print("$key\n");
			else
			{
				$tab[$i] = $key;
				$i++;
			}
		}
		$tmp = implode($tab, ' ');
		$tab = ft_split($tmp);
		foreach ($tab as $key)
			print("$key\n");
	}
	$str_join = implode($argv, ' ');
	$tab = ft_split($str_join);
	$tab = reject_prog_name($tab);
	display_in_order($tab);
?>