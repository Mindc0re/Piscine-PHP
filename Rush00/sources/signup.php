<?php
	session_start();
	function verif_signup()
	{
		if ($_POST['login'] && $_POST['passwd'] && $_POST['passwd_confirm'] && $_POST['submit'])
		{
			$login = htmlspecialchars($_POST['login']);
			$passwd = htmlspecialchars($_POST['passwd']);
			$passwd_confirm = htmlspecialchars($_POST['passwd_confirm']);
			if (!ctype_alnum($login))
			{
				$GLOBALS['signuperr_login'] = true;
				return false;
			}
			if (!ctype_alnum($passwd))
			{
				$GLOBALS['signuperr_pw'] = true;
				return false;
			}
			if (!ctype_alnum($passwd_confirm) || $passwd_confirm != $passwd)
			{
				$GLOBALS['signuperr_pwconfirm'] = true;
				return false;
			}
		}
		else
		{
			$GLOBALS['signuperr_emptyfields'] = true;
			return false;
		}
		return true;
	}

	if (verif_signup())
	{
		echo '<html><head><meta charset="utf-8" /><link rel="stylesheet" href="userspace.css" /><title>42Weapons - Sign up</title></head></html>';
		$login = htmlspecialchars($_POST['login']);
		$passwd = htmlspecialchars($_POST['passwd']);
		$hashed_pw = hash("whirlpool", $passwd);
		$path = "../data";
		if (!file_exists($path))
			mkdir($path);
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
					echo "<h2>This login is already taken, <a href='signup.php'>please pick another</a></h2>\n";
					exit(0);
				}
			}
			$tab[] = $acc_ser;
			$tab_ser = serialize($tab);
			file_put_contents($path."/accounts", $tab_ser);
			echo '<img class="signup_success" src="http://m.memegen.com/q119z0.jpg" alt="You did it"/><br /><br />';
			echo "<h2>Account successfully created ! You can now log in <a href='signin.php'>here</a></h2>";
			exit(0);
		}
		else
		{
			$data = array();
			$data[0] = $acc_ser;
			$data_ser = serialize($data);
			file_put_contents($path."/accounts", $data_ser);
			echo '<img class="signup_success" src="http://m.memegen.com/q119z0.jpg" alt="You did it"/><br /><br />';
			echo "<h2>Account successfully created ! You can now log in <a href='signin.php'>here</a></h2>\n";
			exit(0);
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="userspace.css" />
		<title>42Weapons - Sign up</title>
	</head>
	<body>
		<?php
			if ($_SESSION["loggued_on_user"] == "")
			{
				echo'
				<h1><span class="red">Create</span> <span class="white">your</span> <span class="blue">account</span> <span class="red">right</span> <span class="white">now</span> <span class="blue">by</span> <span class="red">filling</span> <span class="white">the</span> <span class="blue">firm</span> <span class="red">below</span></h1>
				<br />
				<p><h2>Please fill all the fields</h2></p>
				<form method="post" action="signup.php">
					<p>Login: <input type="text" name="login" value="" />';
					if ($GLOBALS["signuperr_login"]) {echo "Your login must contain only alphanumeric characters";}
				echo'</p>
					<br />
					<p>Password: <input type="password" name="passwd" value="" />';
					if ($GLOBALS["signuperr_pw"]) {echo "Your password must contain only alphanumeric characters";}
				echo'</p>
					<br />
					<p>Repeat password: <input type="password" name="passwd_confirm" value="" />';
					if ($GLOBALS["signuperr_pwconfirm"]) {echo "Passwords don't match. Please try again.";}
				echo'</p>
					<br />
					<input type="submit" name="submit" value="OK" />
					<br /><br /><br />
					<img src="http://leseconoclastes.fr/wp-content/uploads/2014/10/WE-WANT-YOU.png" alt="We want you" />
				</form>';
			}
			else
				echo "<br /><br /><h2>You are now loggued in. Please go back to <a href='index.php'>the main page</a>";
		?>
		<h2><a href="index.php">Go back to the index</a></h2>
	</body>
</html>
