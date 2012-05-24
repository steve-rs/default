<?php

include 'config/db.php';

mysql_connect($hostname_DB,$username_DB,$password_DB);
@mysql_select_db($database_DB) or die( "Unable to select database '$database_DB'");
$query="SELECT * FROM phptest";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "<b><center> Database($database_DB) Output From Host($hostname_DB)</center></b><br><br>";

echo "<h1>Instance ID = ";
$file = "/var/spool/cloud/meta-data/instance-id";
if (file_exists($file)) {
#    ob_clean();
#    flush();
    readfile($file);
}
echo "</h1><br>";

echo "<h1>Zone = ";
$file = "/var/spool/cloud/meta-data/placement-availability-zone";
if (file_exists($file)) {
#    ob_clean();
#    flush();
    readfile($file);
}
echo "</h1><br>";

#echo 'HELLO';
echo '<p><center>';

echo "<table border=1>";
$i=0;
while ($i < $num) {
   $id = mysql_result($result,$i, "id");
   $fn = mysql_result($result,$i, "firstname");
   $ln = mysql_result($result,$i, "lastname");

   echo "<tr>";
   echo "<td>$id</td><td>$fn</td><td>$ln</td>";
   echo "</tr>";

   $i++;
}
echo '</table>';
echo '</center>';

#echo "<b> Starting PHPINFO: </b><hr>";
#phpinfo();
?>

