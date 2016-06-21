<?php
	session_start();

	function admin_delete_category($item)
	{
		$fd = fopen("../../data/categories.csv", "r+");
		$deleted = false;
		while ($line = fgetcsv($fd, 0, ';'))
		{
			$i = 1;
			if ($line[0] != $item)
			{
				file_put_contents("../../data/tmp_categories.csv", $line[0].";", FILE_APPEND);
				while ($line[$i])
				{
					file_put_contents("../../data/tmp_categories.csv", $line[$i], FILE_APPEND);
					$i++;
					if ($line[$i])
						file_put_contents("../../data/tmp_categories.csv", ";", FILE_APPEND);
					else
						file_put_contents("../../data/tmp_categories.csv", "\n", FILE_APPEND);
				}
			}
			else
				$deleted = true;
		}
		fclose($fd);
		unlink("../../data/categories.csv");
		rename("../../data/tmp_categories.csv", "../../data/categories.csv");
		return $deleted;
	}

	if ($_POST['submit'] == "OK" && $_POST['name'] && $_POST['content'])
	{
		echo '<html><head><meta charset="utf-8" /><link rel="stylesheet" href="admin.css" /><title>42Weapons - Admin</title></head></html>';
		$name = htmlspecialchars($_POST['name']);
		$newname = htmlspecialchars($_POST['newname']);
		$content = htmlspecialchars($_POST['content']);
		$fd = fopen("../../data/categories.csv", "r+");
		$modified = false;
		while ($line = fgetcsv($fd, 0, ';'))
		{
			if ($line[0] === "$name")
			{
				admin_delete_category($name);
				$new = "$name;$content\n";
				file_put_contents("../../data/categories.csv", $new, FILE_APPEND);
				$modified = true;
				break ;
			}
		}
		if ($modified == false)
		{
			echo "Item not found, couldn't modify. Please <a href='admin_modifcategory.php'>retry</a><br />";
			exit (0);
		}
		else
		{
			echo "<h2>Item modified. You may now go back to <a href='../admin.php'>the admin panel</a></h2>";
			exit (0);
		}
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
				echo'
				<form method="post" action="admin_modifcategory.php">
					<p>Name : <input type="text" name="name" value="" />';
					echo '</p>
					<br />
					<p>Content (armes, séparées par des ;): <input type="text" name="content" value="" />';
					echo '</p>
					<input type="submit" name="submit" value="OK" />
				</form>';
			}
			else
				echo "Sorry bro, but you're not allowed here :3";
		?>
	</body>
</html>
