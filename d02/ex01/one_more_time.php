#!/usr/bin/php
<?PHP

function month($month)
{
	$month = strtolower($month);
	switch($month)
	{
		case "janvier":
			return (1);
			break;
		case "fevrier":
			return (2);
			break;
		case "février":
			return (2);
			break;
		case "mars":
			return (3);
			break;
		case "avril":
			return (4);
			break;
		case "mai":
			return (5);
			break;
		case "juin":
			return (6);
			break;
		case "juillet":
			return (7);
			break;
		case "aout":
			return (8);
			break;
		case "août":
			return (8);
			break;
		case "septembre":
			return (9);
			break;
		case "octobre":
			return (10);
			break;
		case "novembre":
			return (11);
			break;
		case "décembre":
			return (12);	
			break;
		case "decembre":
			return (12);
			break;
		default:
			return (0);
			break;
	}
}

function week($week)
{
	$week = strtolower($week);
	switch($week)
	{
		case "lundi":
			break;
		case "mardi":
			break;
		case "mercredi":
			break;
		case "jeudi":
			break;
		case "vendredi":
			break;
		case "samedi":
			break;
		case "dimanche":
			break;
		default:
			return (1);
			break;
	}
	return (0);
}

if ($argc != 2)
	exit(0);

date_default_timezone_set('UTC');
$regex = $argv[1];
if (preg_match_all("/ /", $regex) == 4 && preg_match_all("/ /", $regex) !== FALSE)
{
	$reg_tab = explode(" ", $regex);
	if (week($reg_tab[0]) == 1)
	{
		echo "Wrong Format\n";
		exit(0);
	}
	if (preg_match_all("/[0-3]?[0-9]{1}/", $reg_tab[1]) == 1)
		$day = $reg_tab[1];
	else
	{
		echo "Wrong Format\n";
		exit(0);
	}
	if (month($reg_tab[2]) != 0)
		$month = month($reg_tab[2]);
	else
	{
		echo "Wrong Format\n";
		exit(0);
	}
	if (preg_match("/[0-9]{4}/", $reg_tab[3]) == 1)
		$year = $reg_tab[3];
	else
	{
		echo "Wrong Format\n";
		exit(0);
	}
	if (preg_match_all("/:/", $reg_tab[4]) == 2)
	{
		$hour_tab = explode(":", $reg_tab[4]);
		$hour = $hour_tab[0] >= 0 && $hour_tab[0] < 24 && strlen($hour_tab[0]) == 2 ? $hour_tab[0] : -1;
		$minutes = $hour_tab[1] >= 0 && $hour_tab[1] <= 59 && strlen($hour_tab[1]) == 2 ? $hour_tab[1] : -1;
		$secondes = $hour_tab[2] >= 0 && $hour_tab[2] <= 59 && strlen($hour_tab[2]) == 2 ? $hour_tab[2] : -1;
	}
	else
	{
		echo "Wrong Format\n";
		exit(0);
	}
	if ($hour != -1 && $minutes != -1 && $secondes != -1)
	{
		$timestamp = mktime($hour, $minutes, $secondes, $month, $day, $year);
		echo "$timestamp\n";
	}
	else
	{
		echo "Wrong Format\n";
		exit(0);
	}
}
else
	echo "Wrong Format\n";
?>