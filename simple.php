<?php
include 'menu.php';

echo "<b><center>";

$file = "/tmp/server.metadata";
if (file_exists($file)) {
    readfile($file);
}
else
{
	echo "No meta data available!";
}

echo "</center></b>";

?>

