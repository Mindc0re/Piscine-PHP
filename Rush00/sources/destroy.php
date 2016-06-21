<?php
	session_start();

	function destroy($passwd)
	{
		$login = $_SESSION["loggued_on_user"];
		$path = "../data";
		if (!file_exists($path."/accounts") || $login == "" || $passwd == "")
			return (false);
		$str = file_get_contents($path."/accounts");
		$tab = array();
		$tab = unserialize($str);
		$i = 0;
		foreach($tab as $key => $value)
		{
			$acc_unser = unserialize($value);
			if ($acc_unser['login'] == $login && $acc_unser['passwd'] == hash("whirlpool", $passwd))
			{
				$acc_unser['login'] = NULL;
				$acc_unser['passwd'] = NULL;
				$tab[$i] = serialize($acc_unser);
				$tab_ser = serialize($tab);
				file_put_contents($path."/accounts", $tab_ser);
				return (true);
			}
			$i++;
		}
		return (false);
	}

	if ($_POST['passwd'] != "" && $_POST['submit'] == "OK")
	{
		if (destroy($_POST['passwd']) == false)
			$GLOBALS["destroy_err"] = true;
		else
		{
			$_SESSION["loggued_on_user"] = "";
			echo "<h2>The account has been successfully deleted, you may go back to <a href='index.php'>the main page</a>.</h2>";
		}
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="userspace.css" />
		<title>42Weapons - Delete account</title>
	</head>
	<body>
		<?php
			if ($_SESSION["loggued_on_user"] == "ChuckNorris" || $_SESSION["loggued_on_user"] == "TimMcJohnson")
				echo "You are an admin. You cannot destroy your account";
			else if ($_SESSION != "")
			{
				echo '<h1 style="color: red">Beware !<br /> You are up to delete your account
				<br /><br />If you don\'t want to proceed, <a href="index.php">go back to the main page</a>
				<br /><br />Else, fill the form</h1>';
				echo '<form action="destroy.php" method="post">
					<p>Please, enter your password, to confirm the deletion:
					<input type="password" name="passwd"/></p>';
				if ($GLOBALS["destroy_err"] == true) {echo "<h3>Incorrect password</h3>";}
				echo '<p><br /><input type="submit" name="submit" value="OK"/></p>
				</form>';
			}
			else
				echo "You are not logged on you silly boy";
		?>
	</body>
	<h2><a href="index.php">Go back to the index</a></h2>
</html>
