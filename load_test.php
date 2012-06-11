<?php

include 'config/db.php';

mysql_connect($hostname_DB,$username_DB,$password_DB);
@mysql_select_db($database_DB) or die( "Unable to select database '$database_DB'");
$query="SELECT * FROM app_test";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "<b><center> Database($database_DB) Output From Host($hostname_DB)</center></b><br><br>";

$file = "/var/spool/cloud/meta-data/instance-id";
if (file_exists($file)) {
    ob_clean();
    flush();
    readfile($file);
}

#echo 'HELLO';
echo '<p><center>';

$i=0;
while ($i < $num) {

$name=mysql_result($result,$i,"name");
$value=mysql_result($result,$i,"value");

echo "<b>$name:$value</b><br><hr><br>";

$i++;
}
echo '</center>';

echo "<b> Starting PHPINFO: </b><hr>";
phpinfo();
?>

