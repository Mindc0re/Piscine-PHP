<?php
	session_start();
	if ($_SESSION["loggued_on_user"] == "")
		echo "You must <a href='signin.php'>login</a> or <a href='signup.php'>sign in</a> to acces this page.";
?>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="userspace.css" />
		<title>42Weapons - Client space</title>
	</head>
	<body>
		<?php
			if ($_SESSION["loggued_on_user"] != "")
			{
				echo "<h1>Welcome ".$_SESSION["loggued_on_user"]." !</h1>";
				echo' <br /><h3><a href="destroy.php">Delete your account</a></h3>';
				echo' <br /><h3><a href="loggued_out.php">Deconnexion (deletes your current basket)</a></h3>';
			}
		?>
		<h2><a href="index.php">Go back to the index</a></h2>
	</body>
</html>
