<?php

include 'config/db.php';

include 'meta.php';

isset ( $database_DB ) or die( "Database name not set");

mysql_connect($hostname_DB,$username_DB,$password_DB);
#@mysql_select_db($database_DB) or die( "Unable to select database '$database_DB'");
@mysql_select_db($database_DB) or die( "Unable to select database '$database_DB' on host '$hostname_DB' using username '$username_DB'");
$query="SELECT * FROM app_test";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "<b>";
echo "<center>";
echo "Database ($database_DB)<br/>hostname ($hostname_DB)<br/>host ip (" . gethostbyname ( $hostname_DB ) . ")";
echo "</b>";
echo "<br><br>";

echo "<table border=3 cellpadding=8>";
echo "<font size='+4'>";

$i=0;
while ($i < $num) {
   $name=mysql_result($result,$i,"name");
   $value=mysql_result($result,$i,"value");

   echo "<tr>";
   echo "<td>$name</td><td>$value</td>";
   echo "</tr>";

   $i++;
}
echo '</table>';
echo '</font>';

#echo "<b> Starting PHPINFO: </b><hr>";
#echo '</center>';
#phpinfo();

?>

