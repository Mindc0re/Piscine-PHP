#!/usr/bin/php
<?PHP
	$number = 0;
	$stdin = fopen("php://stdin", 'r');
	while (1)
	{
		echo "Entrez un nombre: ";
		fscanf($stdin, "%s\n", $number);
		if (feof($stdin))
			exit(0);
		if (is_numeric($number))
		{
			if ($number % 2 == 0)
				echo "Le chiffre $number est Pair\n";
			else
				echo "Le chiffre $number est Impair\n";
		}
		else
			echo "'$number' n'est pas un chiffre\n";
	}
?>