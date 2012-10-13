<?php
include 'menu.php';

echo "<b><center>";

$file = "/var/spool/cloud/meta-data/instance-id";
if (file_exists($file)) {
    readfile($file);
}
else
{
	echo "Unknown Instance";
}

echo "</center></b>";

?>

