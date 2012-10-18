<?php

if ($handle = opendir('.')) {
    echo "Directory handle: $handle\n";
    echo "Entries:\n";

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
	if ( preg_match ( '/^(.*)\.php$/', $entry, $match ) )
	{
        	echo "$match[0] - ";
        	echo "$match[1]<br>";
	}
       	echo "[$entry]<br>";
    }

    closedir($handle);
}

?>

