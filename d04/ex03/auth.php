<?php
	function auth($login, $passwd)
	{
		$path = "../private";
		if (!file_exists($path."/passwd"))
			return (false);
		$str = file_get_contents($path."/passwd");
		$tab = array();
		$tab = unserialize($str);
		foreach($tab as $key => $value)
		{
			$acc_unser = unserialize($value);
			if ($acc_unser['login'] == $login && $acc_unser['passwd'] == hash("whirlpool", $passwd))
				return (true);
		}
		return (false);
	}
?>