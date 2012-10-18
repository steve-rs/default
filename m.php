<?php

echo "<p>";

if ($handle = opendir('.')) {
    while (false !== ($entry = readdir($handle))) {
	if ( preg_match ( '/^(.*)\.(php|html)$/', $entry, $match ) )
	{
        	echo "| <a href=\"$entry\">$match[1]</a>\n";
	}
    }

    echo "| <a href=\"haproxy-status\">haproxy-status</a> ";

    closedir($handle);
}

echo "</p>";

?>

