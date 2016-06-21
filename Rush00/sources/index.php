<?php
	session_start();
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
				<h1><a href="signin.php">Sign in</a></h1>
				<h1><a href="signup.php">Sign up</a></h1>
				<h1><a href="basket.php">Basket</a></h1>
				<h1><a href="account.php">Account</a></h1>
				<?php
					if ($_SESSION["loggued_on_user"] == "ChuckNorris" || $_SESSION["loggued_on_user"] == "TimMcJohnson")
						echo '<h1><a href="admin.php">Admin</a></h1>';
				?>
		</div>
		<br/>
		<div id="site">
			<h1 align="left">Featured weapons of the moment :</h1>
			<br/>
			<?PHP
			$fd = fopen("../data/items.csv", "r");
			$i = 0;
			while ($i < 6 && $lines = fgetcsv($fd, 0, ';'))
			{
				echo "<div id=\"shop\">";
				echo "<a href=\"sales.php?weapon=$lines[0]\">";
				echo "<img id=\"preview\" src=\"$lines[1]\"/>";
				echo "</a>";
				echo "<br/>";
				echo "<p>$lines[2]<h2>Price : $lines[3]$</h2></p>";
				echo "</div>";
				$i++;
			}
			fclose($fd);
			?>
		</div>
		<div id="categories">
			<?PHP
			echo "<h1 align=\"left\">Categories :</h1>";
			$fd = fopen("../data/categories.csv", "r");
			$i = 0;
			while ($lines = fgetcsv($fd, 0, ';'))
			{
				echo "<a href=\"categories.php?type=$lines[0]\"><h2 id=cat>$lines[0]</h2></a>";
				$i++;
			}
			?>
		</div>
	</body>
</html>
