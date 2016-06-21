<?php
	session_start();
	function admin_delete_category()
	{
		$category = htmlspecialchars($_POST["category"]);
		$fd = fopen("../../data/categories.csv", "r+");
		$deleted = false;
		while ($line = fgetcsv($fd, 0, ';'))
		{
			$i = 1;
			if ($line[0] != $category)
			{
				file_put_contents("../../data/tmp_category.csv", $line[0].";", FILE_APPEND);
				while ($line[$i])
				{
					file_put_contents("../../data/tmp_category.csv", $line[$i], FILE_APPEND);
					$i++;
					if ($line[$i])
						file_put_contents("../../data/tmp_category.csv", ";", FILE_APPEND);
					else
						file_put_contents("../../data/tmp_category.csv", "\n", FILE_APPEND);
				}
			}
			else
				$deleted = true;
		}
		fclose($fd);
		unlink("../../data/categories.csv");
		rename("../../data/tmp_category.csv", "../../data/categories.csv");
		return $deleted;
	}

	if (admin_delete_category())
		$GLOBALS['category_deleted'] = true;
	else
		$GLOBALS['category_not_found'] = true;
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
				echo "<h2>If you want to delete a category, you'll need to fill the form below</h2>";
				echo '
					<form action="admin_deletecategory.php" method="post">
						<p>Category name: <input type="text" name="category" value="" /></p>
						<br />
						<input type="submit" name="submit" value="OK" />
					</form>';
				if ($GLOBALS['category_deleted'] === true)
					echo "<h2>Category deleted. You may now go back to <a href='../admin.php'>the admin panel</a></h2>";
				else if ($GLOBALS['category_not_found'] === false)
					echo "Category not found";
			}	
			else
				echo "Sorry bro, but you're not allowed here :3";
		?>
	</body>
</html>