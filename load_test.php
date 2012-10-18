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

# Delete a random row from the table
$lcv = 0;
$row_to_delete = rand ( 0, $num-1 );
$result = mysql_query("SELECT * FROM app_test");
while($row = mysql_fetch_array($result)){
     if($lcv == $row_to_delete){
          mysql_query("DELETE FROM app_test where id = $row[0]");
     }
     $lcv++;
}

# Insert a new row 
$query="insert into app_test values ('', 'Random data', '" . rand(0, 999) . "')";
$result=mysql_query($query);

# Output the table
$query="SELECT * FROM app_test";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "<b>";
echo "<center>";
echo "Database ($database_DB)<br/>hostname ($hostname_DB)<br/>host ip (" . gethostbyname ( $hostname_DB ) . ")";
echo "</b>";
echo "<br><br>";

echo "Number of rows: $num<br>";

echo "<table border=3 cellpadding=8>";
echo "<font size='+4'>";

$i=0;
while ($i < $num) {
   $id=mysql_result($result,$i,"id");
   $name=mysql_result($result,$i,"name");
   $value=mysql_result($result,$i,"value");

   echo "<tr>";
   echo "<td>$id</td><td>$name</td><td>$value</td>";
   echo "</tr>";

   $i++;
}
echo '</table>';
echo '</font>';

#echo "<b> Starting PHPINFO: </b><hr>";
#echo '</center>';
#phpinfo();

?>

