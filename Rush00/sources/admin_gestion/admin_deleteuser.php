<?php
	session_start();
	function admin_delete()
	{
		if ($_POST['submit'] == "OK" && $_POST['login'] && $_POST['passwd'])
		{
			$login = htmlspecialchars($_POST['login']);
			$passwd = htmlspecialchars($_POST['passwd']);
			if ($login == "ChuckNorris" || $login == "TimMcJohnson")
			{
				$GLOBALS['nobody_deletes_chuck'] = true;
				return false;
			}
			$path = "../../data";
			if (file_exists($path."/accounts") && ($str = file_get_contents($path."/accounts")) != "")
			{
				$tab = array();
				$tab = unserialize($str);
				$i = 0;
				foreach ($tab as $key => $value)
				{
					$acc_unser = unserialize($value);
					if ($acc_unser['login'] == $login && $acc_unser['passwd'] == hash("whirlpool", $passwd))
					{
						$acc_unser['login'] = NULL;
						$acc_unser['passwd'] = NULL;
						$tab_ser = serialize($tab);
						file_put_contents($path."/accounts", $tab_ser);
						return true;
					}
					$i++;
				}
			}
		}
		else
			return false;
		return false;
	}

	if ($_POST['submit'] == "OK")
	{
		if (!admin_delete())
			$GLOBALS['admin_delete_err'] = true;
		else
		{
			echo "<h2>Account successfully destroyed ! You may now go back to <a href='../admin.php'>the admin panel</a></h2>";
			exit (0);
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="admin.css">
		<title>42Weapons - Admin</title>
	</head>
	<body id="page">
	<?php
		if ($_SESSION["loggued_on_user"] == "ChuckNorris" || $_SESSION["loggued_on_user"] == "TimMcJohnson")
		{
			echo "<h2>If you want to delete an existing user's account, you'll need to fill the form below</h2>";
			echo '
				<form action="admin_deleteuser.php" method="post">
					<p>Login: <input type="text" name="login" value="" /></p>
					<br />
					<p>Password: <input type="password" name="passwd" value="" /></p>
					<br />
					<input type="submit" name="submit" value="OK" />
				</form>';
			if ($GLOBALS['nobody_deletes_chuck'])
				echo "You cannot delete an admin account.";
			if ($GLOBALS['admin_delete_err'])
				echo "An error occured, please retry.";
		}
		else
			echo "Sorry bro, but you're not allowed here :3";
	?>
	</body>
</html>