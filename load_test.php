<?php

include 'config/db.php';

#include 'meta.php';  # If doing load testing, DO NOT make many requests to Geo API, otherwise you get blocked!
include 'menu.php';  

isset ( $database_DB ) or die( "Database name not set");

mysql_connect($hostname_DB,$username_DB,$password_DB);
#@mysql_select_db($database_DB) or die( "Unable to select database '$database_DB'");
@mysql_select_db($database_DB) or die( "Unable to select database '$database_DB' on host '$hostname_DB' using username '$username_DB'");

$query="SELECT * FROM app_test";
$result=mysql_query($query);
$num=mysql_numrows($result);

$max_value = 9;

# Delete a random row from the table
#$lcv = 0;
# Run DELETE once in every 10
$chance = rand ( 1, 30 );
$values_to_delete = rand ( 0, $max_value );
if ( $chance == 1 )
{
	$result = mysql_query("DELETE FROM app_test WHERE value = $values_to_delete");
	echo "Deleted all rows with the value '$values_to_delete'<br>";
}

#$result = mysql_query("SELECT * FROM app_test order by value");
#while($row = mysql_fetch_array($result)){
#     if($lcv == $row_to_delete){
#          mysql_query("DELETE FROM app_test where id = $row[0]");
#     }
#     $lcv++;
#}

# Run INSERTs once in every 10
$chance = rand ( 1, 20 );
if ( $chance == 1 )
{
	# Insert a new row 
	$query = "insert into app_test values ('', 'Random data', '" . rand(0, $max_value) . "')";
	$result=mysql_query($query);
	# Insert a new row 
	$query = "insert into app_test values ('', 'Random data', '" . rand(0, $max_value) . "')";
	$result=mysql_query($query);
	echo "Inserted two rows<br>";
}

# Output the table
$query="SELECT * FROM app_test order by value";
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
echo '</center>';

#echo "<center><hr><p> Starting PHPINFO: </p><hr></center>";
#phpinfo();

?>

