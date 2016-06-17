<?php
	session_start();
	$user = $_SESSION["loggued_on_user"];
	if ($_SESSION["loggued_on_user"] != "")
		echo "$user\n";
	else
		echo "ERROR\n";
?>