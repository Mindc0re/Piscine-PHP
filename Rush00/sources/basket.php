<?php
	session_start();

	function exists_in_tab($to_find, $basket)
	{
		$i = 0;
		while ($basket[$i])
		{
			if ($basket[$i]['weapon'] == $to_find)
				return (true);
			$i++;
		}
		return (false);
	}

	function create_basket(&$basket)
	{
		$i = 0;
		while ($_SESSION["basket"][$i])
		{
			if (exists_in_tab($_SESSION["basket"][$i], $basket) == false)
				$basket[] = array('weapon' => $_SESSION["basket"][$i], 'number' => 1);
			else
			{
				$j = 0;
				while ($basket[$j])
				{
					if ($basket[$j]['weapon'] == $_SESSION["basket"][$i])
					{
						$basket[$j]['number'] = $basket[$j]['number'] + 1;
						break;
					}
					$j++;
				}
			}
			$i++;
		}
	}

	function calculate_price($weapon, $number)
	{
		$fd = fopen("../data/items.csv", "r");
		$found = false;
		while ($lines = fgetcsv($fd, 0, ';'))
		{
			if ($lines[0] === $weapon)
			{
				$found = true;
				break;
			}
		}
		if ($found)
			return $lines[3] * $number;
		else
			return 0;
	}

	function print_line_basket($ref)
	{
		$fd = fopen("../data/items.csv", "r");
		$found = false;
		while ($lines = fgetcsv($fd, 0, ";"))
		{
			if ($lines[0] == $ref['weapon'])
			{
				$found = true;
				break;
			}
		}
		if ($found)
		{
			echo "<h1>".$ref['number']."x "."<img id='preview' src=\"$lines[1]\" alt=\"$lines[0]\"/>"." ".$ref['weapon']."<strong> ---> </strong>".calculate_price($ref['weapon'], $ref['number'])."$</h1><br />";
			fclose($fd);
		}
	}
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
		<div id="site">
			<?php
				if ($_GET['add_article'] && $_GET['add_article'] != "")
				{
					$article = htmlspecialchars($_GET['add_article']);
					$fd = fopen("../data/items.csv", "r");
					$found = false;
					while ($lines = fgetcsv($fd, 0, ';'))
					{
						if ($lines[0] === $article)
						{
							$found = true;
							break;
						}
					}
					if ($found)
					{
						echo "$article has been added to your basket !<br />";
						if (!$_SESSION["basket"])
							$_SESSION["basket"] = array();
						array_push($_SESSION["basket"], $lines[0]);
						fclose($fd);
					}
					else
						echo "This article doesn't exist.";
				}
				echo "<br />";
				$basket = array();
				create_basket($basket);
				if ($_SESSION["archived"] === true)
				{
					$basket = "";
					$_SESSION["archived"] = false;
				}
				$i = 0;
				$total = 0;
				while ($basket[$i])
				{
					$total += calculate_price($basket[$i]['weapon'], $basket[$i]['number']);
					print_line_basket($basket[$i]);
					$i++;
				}
				if ($total != 0)
					echo "<h2>Total : $total $</h2>";
				echo "<br /><br /><br />";
				if ($_SESSION["loggued_on_user"] == "")
					echo "<h2>To validate your basket and achieve your order, <a href='signin.php'>log in</a></h2>";
				else
				{
					$_SESSION["final_basket"] = $basket;
					$_SESSION["total_basket"] = $total;
					echo "<h2><a href='validate_basket.php'>Validate your basket</a></h2>";
				}
			?>
		</div>
		<h2><a href="index.php">Go back to the index</a></h2>
	</body>
</html>
