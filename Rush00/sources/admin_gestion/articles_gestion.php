<?php
	session_start();
?>

<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../index.css">
		<title>42Weapons - Admin</title>
	</head>
	<body id="page">
		<div id="site">
			<?php
				if ($_SESSION["loggued_on_user"] == "ChuckNorris" || $_SESSION["loggued_on_user"] == "TimMcJohnson")
				{
					echo "<h2>Welcome to the articles gestion !</h2>";
					echo "<h3><a href=\"admin_additem.php\">Add item</a></h3>";
					echo "<h3><a href=\"admin_modifitem.php\">Modif item</a></h3>";
					echo "<h3><a href=\"admin_deleteitem.php\">Delete item</a></h3>";
				}
				else
					echo "Sorry bro, but you're not allowed here :3";
			?>
		</div>
		<?php
			if ($_SESSION["loggued_on_user"] == "ChuckNorris" || $_SESSION["loggued_on_user"] == "TimMcJohnson")
				echo "<h2><a href=\"../admin.php\">Go back to the admin panel</a></h2>";
		?>
	</body>
</html>
