<?php
	session_start();
	if ($_POST["submit"] && $_POST["name"])
	{
		$name = htmlspecialchars($_POST['name']);
		file_put_contents("../../data/categories.csv", $name."\n", FILE_APPEND);
		$GLOBALS['admin_category_added'] = true;
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
				echo "<h2>Fill the field of the form below to add a category</h2>";
				echo '
					<form method="post" action="admin_addcategory.php">
						<p>Name: <input type="text" name="name" value="" /></p>
						<br /><br />
						<input type="submit" name="submit" value="OK" />
					</form>';
					if ($GLOBALS['admin_category_added'])
						echo "Category added successfully ! You may now go back to <a href='../admin.php'>the admin panel</a>";
			}
			else
				echo "Sorry bro, but you're not allowed here :3";
		?>
	</body>
</html>