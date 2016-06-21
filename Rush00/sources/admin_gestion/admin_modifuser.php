<?php
	session_start();
	function verif_modifusr()
	{
		if ($_POST['submit'] == "OK" && $_POST['oldlogin'] && $_POST['newlogin'] && $_POST['oldpw'] && $_POST['newpw'])
		{
			$oldlogin = htmlspecialchars($_POST['oldlogin']);
			$newlogin = htmlspecialchars($_POST['newlogin']);
			$oldpw = htmlspecialchars($_POST['oldpw']);
			$newpw = htmlspecialchars($_POST['newpw']);
			$check = 0;
			if (!ctype_alnum($oldlogin))
			{
				$GLOBALS['admin_mod_usr_err_oldlogin'] = true;
				return false;
			}
			if (!ctype_alnum($newlogin))
			{
				$GLOBALS['admin_mod_usr_err_newlogin'] = true;
				return false;
			}
			if (!ctype_alnum($oldpw))
			{
				$GLOBALS['admin_mod_usr_err_oldpw'] = true;
				return false;
			}
			if (!ctype_alnum($newpw))
			{
				$GLOBALS['admin_mod_usr_err_newpw'] = true;
				return false;
			}
			if ($oldlogin == $newlogin)
				$check++;
			if ($oldpw == $newpw)
				$check++;
			if ($check == 2)
			{
				$GLOBALS['admin_mod_usr_err_0modif'] = true;
				return false;
			}
			if ($oldlogin == "ChuckNorris" || $old_login == "TimMcJohson")
			{
				$GLOBALS['nobody_modifies_chuck'] = true;
				return false;
			}
		}
		else
			return false;
		return true;
	}

	if (verif_modifusr())
	{
		echo '<html><head><meta charset="utf-8" /><link rel="stylesheet" href="admin.css" /><title>42Weapons - Admin</title></head></html>';
		$oldlogin = htmlspecialchars($_POST['oldlogin']);
		$newlogin = htmlspecialchars($_POST['newlogin']);
		$oldpw = htmlspecialchars($_POST['oldpw']);
		$newpw = htmlspecialchars($_POST['newpw']);
		$hashed_newpw = hash("whirlpool", $newpw);
		$path = "../../data";
		if (file_exists($path."/accounts") && ($str = file_get_contents($path."/accounts")) != "")
		{
			$i = 0;
			$tab = array();
			$tab = unserialize($str);
			foreach ($tab as $key => $value)
			{
				$acc_unser = unserialize($value);
				if ($acc_unser['login'] == $oldlogin && $acc_unser['passwd'] == hash("whirlpool", $oldpw))
				{
					$acc_unser['login'] = $newlogin;
					$acc_unser['passwd'] = $hashed_newpw;
					$tab[$i] = serialize($acc_unser);
					$tab_ser = serialize($tab);
					file_put_contents($path."/accounts", $tab_ser);
					echo "<h2>Account successfully modified ! You may now go back to <a href='../admin.php'>the admin panel</a></h2>";
					exit(0);
				}
				$i++;
			}
			echo "Account not found, couldn't modify. Please <a href='admin_modifuser.php'>retry</a><br />";
			exit (0);
		}
	}
?>

<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="admin.css">
		<title>42Weapons - Admin</title>
	</head>
	<body id="page">
		<?php
			if ($_SESSION["loggued_on_user"] == "ChuckNorris" || $_SESSION["loggued_on_user"] == "TimMcJohnson")
			{
				echo "<h2>If you want to modify an existing user's informations, you need to modify either his login or his password (or both of them)</h2>";
				echo'
				<form method="post" action="admin_modifuser.php">
					<p>Old login: <input type="text" name="oldlogin" value="" />';
					if ($GLOBALS['admin_mod_usr_err_oldlogin']) {echo "The login must contain only alphanumeric characters";}
					echo '</p>
					<br />
					<p>New login (If you don\'t want to modify the login, just fill this with the current login): <input type="text" name="newlogin" value="" />';
					if ($GLOBALS['admin_mod_usr_err_newlogin']) {echo "The login must contain only alphanumeric characters";}
					echo '</p>
					<br />
					<p>Old password: <input type="password" name="oldpw" value="" />';
					if ($GLOBALS['admin_mod_usr_err_oldpw']) {echo "The password must contain only alphanumeric characters";}
					echo '</p>
					<br />
					<p>New password (If you don\'t want to modify the password, just fill this with the current password): <input type="password" name="newpw" value="" />';
					if ($GLOBALS['admin_mod_usr_err_newpw']) {echo "The password must contain only alphanumeric characters";}
					echo'</p>
					<input type="submit" name="submit" value="OK" />
				</form>';
				if ($GLOBALS['admin_mod_usr_err_0modif']) {echo "You must modify either the login or the password";}
				if ($GLOBALS['nobody_modifies_chuck']) {echo "You cannot modify an admin account";}
			}
			else
				echo "Sorry bro, but you're not allowed here :3";
		?>
	</body>
</html>