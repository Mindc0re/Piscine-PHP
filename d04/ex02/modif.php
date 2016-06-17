<?php
	if ($_POST['submit'] == "OK")
	{
		if ($_POST['login'])
			$login = $_POST['login'];
		else
		{
			echo "ERROR\n";
			exit(0);
		}
		if ($_POST['oldpw'])
			$oldpw = $_POST['oldpw'];
		else
		{
			echo "ERROR\n";
			exit(0);
		}
		if ($_POST['newpw'])
			$newpw = $_POST['newpw'];
		else
		{
			echo "ERROR\n";
			exit(0);
		}
	}
	else
	{
		echo "ERROR\n";
		exit(0);
	}
	$hashed_newpw = hash("whirlpool", $newpw);
	$path = "../private";
	if (!file_exists($path."/passwd"))
	{
		echo "ERROR\n";
		exit (0);
	}
	$i = 0;
	$str = file_get_contents($path."/passwd");
	$new_tab = array();
	$new_tab = unserialize($str);
	foreach($new_tab as $key => $value)
	{
		$acc_unser = unserialize($value);
		if ($acc_unser['login'] == $login && $acc_unser['passwd'] == hash("whirlpool", $oldpw))
		{
			$acc_unser['passwd'] = $hashed_newpw;
			$new_tab[$i] = serialize($acc_unser);
			$new_tab_ser = serialize($new_tab);
			file_put_contents($path."/passwd", $new_tab_ser);
			echo "OK\n";
			exit (0);
		}
		$i++;
	}
	echo "ERROR\n";
	exit (0);
?>