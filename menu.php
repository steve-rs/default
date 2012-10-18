<?php

echo "<p>";

#if ($handle = opendir('.')) {
$files = listdir('.'); 
sort($files, SORT_LOCALE_STRING); 
foreach ($files as $entry) { 
#    while (false !== ($entry = readdir($handle))) {
	if ( preg_match ( '/^(.*)\.(php|html)$/', $entry, $match ) )
	{
        	echo "| <a href=\"$entry\">$match[1]</a>\n";
	}
}

    echo "| <a href=\"haproxy-status\">haproxy-status</a> ";
    echo "|";

    #closedir($handle);
#}

echo "</p>";

?>


