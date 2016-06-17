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
		if ($_POST['passwd'])
			$passwd = $_POST['passwd'];
		else
		{
			echo "ERROR\n";
			exit(0);
		}
		$hashed_pw = hash("whirlpool", $passwd);
		$path = "../private";
		if (!file_exists($path))
			mkdir($path);
		$account = array('login' => $login, 'passwd' => $hashed_pw);
		$acc_ser = serialize($account);
		if (file_exists($path."/passwd"))
		{
			$str = file_get_contents($path."/passwd");
			$tab = array();
			$tab = unserialize($str);
			foreach ($tab as $key => $value)
			{
				$acc_unser = unserialize($value);
				if ($acc_unser['login'] == $login)
				{
					echo "ERROR\n";
					exit(0);
				}
			}
			$tab[] = $acc_ser;
			$tab_ser = serialize($tab);
			file_put_contents($path."/passwd", $tab_ser);
		}
		else
		{
			$data = array();
			$data[0] = $acc_ser;
			$data_ser = serialize($data);
			file_put_contents($path."/passwd", $data_ser);
		}
		echo "OK\n";
	}
	else
		echo "ERROR\n";
?>