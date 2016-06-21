<?php
	session_start();

	function auth($login, $passwd)
	{
		$path = "../data";
		if (!file_exists($path."/accounts"))
			return (false);
		$str = file_get_contents($path."/accounts");
		if ($str == "")
			return (false);
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

	function verif_signin()
	{
		if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'])
		{
			$login = htmlspecialchars($_POST['login']);
			$passwd = htmlspecialchars($_POST['passwd']);
			if (auth($login, $passwd))
			{
				$_SESSION["loggued_on_user"] = $login;
				$GLOBALS['signinerr_login'] = false;
				return (true);
			}
			else
			{
				$_SESSION["loggued_on_user"] = "";
				$GLOBALS['signinerr_login'] = true;
				return (false);
			}
		}
		else
		{
			$_SESSION["loggued_on_user"] = "";
			$GLOBALS['signinerr_emptyfields'] = true;
			return (false);
		}
	}
	if ($_SESSION["loggued_on_user"] == "")
		verif_signin();
?>

<!doctype html>
<html>
	<head>
		<title>42 Weapons</title>
		<link rel="stylesheet" type="text/css" href="index.css" />
	</head>
	<body id="page">
		<div id="menu">
			<a href="index.php"><h1 align="Center">42 Weapons</h1></a>
			<div class= "box" id ="signin">
				<h1><a href="signin.php">Sign in</a></h1>
			</div>
			<div class = box id ="signup">
				<h1><a href="signup.php">Sign up</a></h1>
			</div>
			<div class = box id ="basket">
				<h1><a href="basket.php">Basket</a></h1>
			</div>
		</div>
		<br/>
		<span id="signin_form">
			<?php
				if ($_SESSION["loggued_on_user"] == "")
				{echo '
				<br /><br />
				<h1>Connexion</h1>
				<br />
				<p>';
				if ($GLOBALS["signinerr_emptyfields"]) {echo "<h2>Please fill all the fields</h2>";}
				echo'</p>
				<form action="signin.php" method="post">
					<p>Login: <input type="text" name="login" value="" /></p>
					<br />
					<p>Password: <input type="password" name="passwd" value="" /></p>
					<br />
					<input type="submit" name="submit" value="OK" />
					<br />';
				if ($GLOBALS["signinerr_login"]){echo "<h3>Invalid login or password</h3>";}
				echo'</form>';}
				else
					echo "<br /><br /><h2>You are now loggued in, please return to <a href='index.php'>the main page</a>";
			?>
		</span>
		<h2><a href="index.php">Go back to the index</a></h2>
	</body>
</html>
