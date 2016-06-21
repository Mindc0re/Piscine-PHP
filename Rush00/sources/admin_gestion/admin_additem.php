<?php
	session_start();
	if ($_POST["submit"] && $_POST["name"] && $_POST["img"] && $_POST["description"] && $_POST["price"])
	{
		$name = htmlspecialchars($_POST['name']);
		$image = htmlspecialchars($_POST['img']);
		$description = htmlspecialchars($_POST['description']);
		$price = htmlspecialchars($_POST['price']);
		file_put_contents("../../data/items.csv", $name.";".$image.";".$description.";".$price."\n", FILE_APPEND);
		$GLOBALS['admin_item_added'] = true;
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
				echo "<h2>Fill all the fields of the form below to add an item</h2>";
				echo '
					<form method="post" action="admin_additem.php">
						<p>Name: <input type="text" name="name" value="" /></p>
						<br />
						<p>Image: <input type="text" name="img" value="" /></p>
						<br />
						<label for="description">Description: </label>
						<p><textarea name="description" id="description" rows="10" cols="50"></textarea>
						</p>
						<br />
						<p>Price: <input type="text" name="price" value="" />
						<br /><br />
						<input type="submit" name="submit" value="OK" />
					</form>';
					if ($GLOBALS['admin_item_added'])
						echo "Item added successfully ! You may now go back to <a href='../admin.php'>the admin panel</a>";
			}
			else
				echo "Sorry bro, but you're not allowed here :3";
		?>
	</body>
</html>