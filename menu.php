<?php

echo '
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
body {
	background: #ffffff;
	margin: 0;
	padding: 20px;
	line-height: 1.4em;
	font-family: tahoma, arial, sans-serif;
	font-size: 100;
}

table {
	margin: 0;
	background: #FFFFFF;
	border: 1px solid #333333;
	border-collapse: collapse;
}

td, th {
	border-bottom: 1px solid #333333;
	padding: 6px 16px;
	text-align: left;
}

th {
	background: #EEEEEE;
}

caption {
	background: #E0E0E0;
	margin: 0;
	border: 1px solid #333333;
	border-bottom: none;
	padding: 6px 16px;
	font-weight: bold;
}
</style>
</head>
<body>
';

echo "<p>";
#if ($handle = opendir('.')) {

$handle = opendir('.') or die("Error opening directory '.'");

$files = array(); 
#listdiraux('.', $files); 

while (false !== ($entry = readdir($handle))) {
	$files[] = $entry;
}
closedir($handle);

sort($files, SORT_LOCALE_STRING); 

$tooltip = array(
    "menu" => "Displays the menu bar",
    "index" => "Shows the meta data and the content of the db table, but no changes are made to the db",
    "load_test" => "Makes random changes to the db table and then displays its content",
    "health" => "Used by the load balancer to check the app server is responding",
    "meta" => "Shows just the server's meta data and map location",
    "reset_db" => "Empties the db table and inserts a couple of rows",
    "mctest" => "Shows use of a memcache server, if available",
    "haproxystatus" => "Shows status of load balancer",
);

foreach ($files as $entry) {
	if ( preg_match ( '/^(.*)\.(php|html)$/', $entry, $match ) )
	{
		$m = $match[1];
		echo "| <a href=\"$entry\" title=\"$tooltip[$m]\">$m</a>\n";
	}
}

echo "| <a href=\"haproxy-status\" title=\"$tooltip[haproxystatus]\">haproxy-status</a> ";
echo "|";

echo "</p>";

?>

