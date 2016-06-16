<?php
	$i = 0;
	foreach($_GET as $key => $val)
	{
		echo "$key: $val\n";
		$i++;
	}
?>