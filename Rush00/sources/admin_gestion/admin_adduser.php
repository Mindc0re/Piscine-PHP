<?php
	session_start();
	function verif_addusr()
	{
		if ($_POST['login'] && $_POST['passwd'] && $_POST['passwd_confirm'] && $_POST['submit'])
		{
			$login = htmlspecialchars($_POST['login']);
			$passwd = htmlspecialchars($_POST['passwd']);
			$passwd_confirm = htmlspecialchars($_POST['passwd_confirm']);
			if (!ctype_alnum($login))
			{
				$GLOBALS['admin_add_usr_err_login'] = true;
				return false;
			}
			if (!ctype_alnum($passwd))
			{
				$GLOBALS['admin_add_usr_err_pw'] = true;
				return false;
			}
			if (!ctype_alnum($passwd_confirm) || $passwd_confirm != $passwd)
			{
				$GLOBALS['admin_add_usr_err_pwconfirm'] = true;
				return false;
			}
		}
		else
			return false;
		return true;
	}

	if (verif_addusr())
	{
		echo '<html><head><meta charset="utf-8" /><link rel="stylesheet" href="admin.css" /><title>42Weapons - Admin</title></head></html>';
		$login = htmlspecialchars($_POST['login']);
		$passwd = htmlspecialchars($_POST['passwd']);
		$hashed_pw = hash("whirlpool", $passwd);
		$path = "../../data";
		$account = array('login' => $login, 'passwd' => $hashed_pw);
		$acc_ser = serialize($account);
		if (file_exists($path."/accounts") && ($str = file_get_contents($path."/accounts")) != "")
		{
			$tab = array();
			$tab = unserialize($str);
			foreach ($tab as $key => $value)
			{
				$acc_unser = unserialize($value);
				if ($acc_unser['login'] == $login)
				{
					echo '<img src="http://s2.quickmeme.com/img/fe/fe92f9846cfc91fbce8f63ad8af09ea368a91d979e5a590f01e6ae954e2922ca.jpg" alt="Too bad"/><br /><br />';
					echo "<h2>This login is already taken, <a href='admin_adduser.php'>please pick another</a></h2>\n";
					exit(0);
				}
			}
			$tab[] = $acc_ser;
			$tab_ser = serialize($tab);
			file_put_contents($path."/accounts", $tab_ser);
			echo '<img class="signup_success" src="http://m.memegen.com/q119z0.jpg" alt="You did it"/><br /><br />';
			echo "<h2>Account successfully created ! You may now go back to <a href='../admin.php'>the admin panel</a></h2>";
			exit(0);
		}
		else
		{
			$data = array();
			$data[0] = $acc_ser;
			$data_ser = serialize($data);
			file_put_contents($path."/accounts", $data_ser);
			echo '<img class="signup_success" src="http://m.memegen.com/q119z0.jpg" alt="You did it"/><br /><br />';
			echo "<h2>Account successfully created ! You may now go back to <a href='../admin.php'>the admin panel</a></h2>";
			exit(0);
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
				echo "<h2>Fill all the fields of the form below to add an user</h2>";
				echo '
					<form method="post" action="admin_adduser.php">
						<p>Login: <input type="text" name="login" value="" />';
						if ($GLOBALS["admin_add_usr_err_login"]) {echo "The login must contain only alphanumeric characters";}
						echo'</p>
						<br />
						<p>Password: <input type="password" name="passwd" value="" />';
						if ($GLOBALS["admin_add_usr_err_pw"]) {echo "Your password must contain only alphanumeric characters";}
						echo'</p>
						<br />
						<p>Repeat password: <input type="password" name="passwd_confirm" value="" />';
						if ($GLOBALS["admin_add_usr_err_pwconfirm"]) {echo "Passwords don't match. Please try again.";}
						echo'</p>
						<br />
						<input type="submit" name="submit" value="OK" />
					</form>';
			}
			else
				echo "Sorry bro, but you're not allowed here :3";
		?>
	</body>
</html>