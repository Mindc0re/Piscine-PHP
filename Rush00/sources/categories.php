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
			<div class= "box" id ="signup">
				<h1><a href="signup.php">Sign up</a></h1>
			</div>
			<div class= "box" id ="basket">
				<h1><a href="basket.php">Basket</a></h1>
			</div>
			<div class= "box" id ="account">
				<h1><a href="account.php">Account</a></h1>
			</div>
		</div>
		<br/>
		<div id="site">
			<?PHP
			$category = $_GET["type"];
			echo "<h1 align=\"left\">Featured $category :</h1>
			<br/>";
			$fd = fopen("../data/items.csv", "r");
			$fd2 = fopen("../data/categories.csv", "r");
			while ($line = fgetcsv($fd2, 0, ';'))
			{
				if ($line[0] === $category)
				{
					$i = 1;
					while ($line[$i])
					{
						while ($weapon = fgetcsv($fd, 0, ';'))
						{
							if ($weapon[0] === $line[$i])
							{
								echo "<div id=\"shop\">";
								echo "<a href=\"sales.php?weapon=$weapon[0]\">";
								echo "<img id=\"preview\" src=\"$weapon[1]\"/>";
								echo "</a>";
								echo "<br/>";
								echo "<p> $weapon[2]<h2>Price : $weapon[3]$</h2></p>";
								echo "</div>";
							}
						}
						rewind($fd);
						$i++;
					}
					break ;
				}
			}
			fclose($fd);
			fclose($fd2);
			?>
			<h2><a href="index.php">Go back to the index</a></h2>
		</div>
	</body>
</html>
