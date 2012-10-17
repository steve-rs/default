<?php

include 'menu.php';

echo "<b><center>";

$file = "/tmp/server.metadata";

if (file_exists($file)) {
    #readfile($file);
    $lines = file($file);
    // Loop through our array, show HTML source as HTML source; and line numbers too.
    if ( $lines )
    {
        foreach ($lines as $line) {
            echo htmlspecialchars($line) . "<br />\n";
        }
    }
    else
    {
        echo "Meta data file is emply!";
    }
}
else
{
	echo "Meta data file missing or unreadable!";
}

echo "</center></b>";

echo "<br/>";

?>

