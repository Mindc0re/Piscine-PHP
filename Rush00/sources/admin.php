<?php
	session_start();
?>

<!doctype html>
<html>
	<head>
		<title>42 Weapons - Admin</title>
		<link rel="stylesheet" type="text/css" href="index.css" />
	</head>
	<body id="page">
		<div id="site">
			<?php
				if ($_SESSION["loggued_on_user"] == "ChuckNorris" || $_SESSION["loggued_on_user"] == "TimMcJohnson")
				{
					echo "<h1 style=\"text-align: center;\"><span style=\"color: red;\">Welcome</span> <span style =\"color: white\">home</span> <span style=\"color: blue;\">".$_SESSION["loggued_on_user"]."</span></h1>";
					echo "<h1>Basket history<br /></h1>";
					if (!file_exists("../data/basket_archives.csv"))
						echo "<h1>No basket found</h1>";
					else
					{
						$fd = fopen("../data/basket_archives.csv", "r");
						while ($lines = fgetcsv($fd, 0, ";"))
						{
							$max = 1;
							$i = 1;
							echo "<h2>Basket validated by ".$lines[0]." --------> ";
							while ($lines[$max])
								$max++;
							while ($i < $max - 1)
							{
								echo $lines[$i]." ";
								$i++;
							}
							echo "Total: ".$lines[$i]."$</h2><br />";
						}
						fclose($fd);
					}
				}
				else
					echo "Sorry bro, but you're not allowed here :3";
			?>
		</div>
		<?php
			if ($_SESSION["loggued_on_user"] == "ChuckNorris" || $_SESSION["loggued_on_user"] == "TimMcJohnson")
			{
				echo "<h3><a href=\"admin_gestion/users_gestion.php\">Users gestion</a></h3>";
				echo "<h3><a href=\"admin_gestion/articles_gestion.php\">Articles gestion</a></h3>";
				echo "<h3><a href=\"admin_gestion/categories_gestion.php\">Categories gestion</a></h3>";
			}
		?>
		<h2><a href="index.php">Go back to the index</a></h2>
	</body>
</html>