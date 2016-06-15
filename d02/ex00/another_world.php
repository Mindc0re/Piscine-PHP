#!/usr/bin/php
<?PHP
	if ($argc != 2)
		exit(0);
	$regex = $argv[1];
	$regex = preg_replace("/^\t+/", "", $regex);
	$regex = preg_replace("/\t+$/", "", $regex);
	$regex = preg_replace("/^ +/", "", $regex);
	$regex = preg_replace("/ +$/", "", $regex);
	$regex = preg_replace("/\t/", " ", $regex);
	$regex = preg_replace("/  /", " ", $regex);
	while (strstr($regex, "\t") || strstr($regex, "  "))
	{
		$regex = preg_replace("/^\t/", "", $regex);
		$regex = preg_replace("/\t+$/", "", $regex);
		$regex = preg_replace("/^ /", "", $regex);
		$regex = preg_replace("/ $/", "", $regex);
		$regex = preg_replace("/\t/", " ", $regex);
		$regex = preg_replace("/  /", " ", $regex);
	}
	echo "$regex\n";
?>