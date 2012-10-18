<?php

include 'config/db.php';
include 'meta.php';

echo "<center>";
echo "<font size='+3'>";

echo "<b>Database($database_DB) Output From Host($hostname_DB)</b><p>";

mysql_connect($hostname_DB,$username_DB,$password_DB);
@mysql_select_db($database_DB) or die( "Unable to select database '$database_DB' on host '$hostname_DB' using username '$username_DB'");
#$query="SELECT * FROM phptest";
$query="SELECT * FROM app_test";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

echo '</font>';
echo "<font size='+4'>";
echo "<table border=3 cellpadding=8>";
$i=0;
while ($i < $num) {
   $id = mysql_result($result,$i, "id");
   $name=mysql_result($result,$i,"name");
   $value=mysql_result($result,$i,"value");

   echo "<tr>";
   echo "<td>$id</td><td>$name</td><td>$value</td>";
   echo "</tr>";

   $i++;
}
echo '</table>';
echo '</font>';
echo '</center>';

#echo "<b> Starting PHPINFO: </b><hr>";
#phpinfo();
?>

