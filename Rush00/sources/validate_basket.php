<?php
	session_start();

	function archive_basket($basket, $total)
	{
		$i = 0;
		$path = "../data/basket_archives.csv";
			file_put_contents($path, $_SESSION["loggued_on_user"].";", FILE_APPEND);
		while ($basket[$i])
		{
			file_put_contents($path, $basket[$i]['weapon']." x".$basket[$i]['number'].";", FILE_APPEND);
			$i++;
		}
		file_put_contents($path, $total, FILE_APPEND);
		file_put_contents($path, "\n", FILE_APPEND);
	}

	echo "<html><body id=\"page\"><head><meta charset=\"utf-8\"><link rel=\"stylesheet\" type=\"text/css\" href=\"index.css\"><title>42Weapons - Basket validation</title></head></body></html>";
	if ($_SESSION["final_basket"])
	{
		archive_basket($_SESSION["final_basket"], $_SESSION["total_basket"]);
		$_SESSION["basket"] = "";
		$_SESSION["final_basket"] = "";
		$_SESSION["total_basket"] = "";
		$_SESSION["archived"] = true;
		echo "<h1 style=\"text-align: center;\">Basket archived.</h1><br />";
		echo "<h2 style=\"text-align: center;\">You may now go back to <a href=\"index.php\">the index</a></h2>";
	}
	else
	{
		echo "An error occured with the basket or your basket is empty, sorry\n";
		echo "Please go back to <a href='index.php'>the index</a>";
		exit (0);
	}
?>