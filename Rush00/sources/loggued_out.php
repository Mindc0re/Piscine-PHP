<?php
	session_start();
	echo '<html><body id="page"><head><meta charset="utf-8" /><link rel="stylesheet" href="index.css" /><title>42Weapons - Admin</title></head></body></html>';
	if ($_SESSION["loggued_on_user"] != "")
	{
		$_SESSION["loggued_on_user"] = "";
		$_SESSION["basket"] = "";
		echo "You successfully loggued out, please return to <a href='index.php'>the main page</a>.";
	}
?>
