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

echo "<b><center>";
echo "Database ($database_DB)<br/>hostname ($hostname_DB)<br/>host ip (" . gethostbyname ( $hostname_DB ) . ")";
echo "</center></b>";
echo "<br><br>";
echo "Master DB IP Address (" . gethostbyname ( $hostname_DB ) . ")<br/>\n";

echo '<p><center>';

echo '</font>';
echo "<font size='+4'>";
echo "<table border=3 cellpadding=8>";
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
echo '</center>';

echo "<b> Starting PHPINFO: </b><hr>";
echo '</center>';
#phpinfo();

?>

