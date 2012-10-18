<?php

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

foreach ($files as $entry) { 
	if ( preg_match ( '/^(.*)\.(php|html)$/', $entry, $match ) )
	{
        	echo "| <a href=\"$entry\">$match[1]</a>\n";
	}
}

echo "| <a href=\"haproxy-status\">haproxy-status</a> ";
echo "|";

echo "</p>";

?>

