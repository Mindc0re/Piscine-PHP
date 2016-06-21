<?php
	session_start();
	function admin_delete_item()
	{
		$item = htmlspecialchars($_POST["item"]);
		$fd = fopen("../../data/items.csv", "r+");
		$deleted = false;
		while ($line = fgetcsv($fd, 0, ';'))
		{
			$i = 1;
			if ($line[0] != $item)
			{
				file_put_contents("../../data/tmp_items.csv", $line[0].";", FILE_APPEND);
				while ($line[$i])
				{
					file_put_contents("../../data/tmp_items.csv", $line[$i], FILE_APPEND);
					$i++;
					if ($line[$i])
						file_put_contents("../../data/tmp_items.csv", ";", FILE_APPEND);
					else
						file_put_contents("../../data/tmp_items.csv", "\n", FILE_APPEND);
				}
			}
			else
				$deleted = true;
		}
		fclose($fd);
		unlink("../../data/items.csv");
		rename("../../data/tmp_items.csv", "../../data/items.csv");
		return $deleted;
	}

	if (admin_delete_item())
		$GLOBALS['item_deleted'] = true;
	else
		$GLOBALS['item_not_found'] = true;
?>

<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="admin.css">
		<title>42Weapons - Admin</title>
	</head>
	<body>
		<?php
			if ($_SESSION["loggued_on_user"] == "ChuckNorris" || $_SESSION["loggued_on_user"] == "TimMcJohnson")
			{
				echo "<h2>If you want to delete an item, you'll need to fill the form below</h2>";
				echo '
					<form action="admin_deleteitem.php" method="post">
						<p>Item name: <input type="text" name="item" value="" /></p>
						<br />
						<input type="submit" name="submit" value="OK" />
					</form>';
				if ($GLOBALS['item_deleted'] === true)
					echo "<h2>Item deleted. You may now go back to <a href='../admin.php'>the admin panel</a></h2>";
				else if ($GLOBALS['item_not_found'] === false)
					echo "Item not found";
			}	
			else
				echo "Sorry bro, but you're not allowed here :3";
		?>
	</body>
</html>