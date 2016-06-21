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
		<div id="site2">
			<?PHP
			$weapon = $_GET["weapon"];
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
			{
				echo "<h1>$lines[0]</h1>";
				echo "<img id=\"sale\" src=\"$lines[1]\"/>";
				echo "<h2>$lines[2]</h2>";
				echo "<h2>Price : $lines[3]$</h2.>";
				echo "<div class=\"box\"><a href=\"basket.php?add_article=$lines[0]\"><h3>Add to the basket</h3></a></div>";
			}
			else
				echo "<h1>Weapon not found...</h1>";
			?>
		</div>
		<h2><a href="index.php">Go back to the index</a></h2>
	</body>
<html>
