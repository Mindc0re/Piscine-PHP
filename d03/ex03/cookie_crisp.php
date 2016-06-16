<?php
	if ($_GET['action'] && $_GET['name'])
	{
		$name = $_GET['name'];
		if ($_GET['action'] == "set")
		{
			if ($_GET['value'])
				setcookie($name, $_GET['value'], time()+3600);
			else
				exit (0);
		}
		else if ($_GET['action'] == "get")
		{
			if ($_COOKIE[$name])
				echo "$_COOKIE[$name]\n";
			else
				exit(0);
		}
		else if ($_GET['action'] == "del")
			setcookie($name, "", time()-3600);
	}
	else
		exit(0);
?>