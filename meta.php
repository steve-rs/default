<?php

include 'menu.php';

echo "<b><center>";

$file = "/tmp/server.metadata";

echo "<table>";
echo "<tr>";
echo "<td>";

if (file_exists($file)) {
	#readfile($file);
	$lines = file($file);
	// Loop through our array, show HTML source as HTML source; and line numbers too.
	if ( $lines )
	{
		foreach ($lines as $line)
		{
			echo htmlspecialchars($line) . "<br />\n";

			# Look for public IP
			if ( ! isset ( $pub_ip ) )
			{
				if ( preg_match ( '/^\d+\.\d+\.\d+\.\d+/', $line, $match ) )
				{
					if (
						! preg_match ( '/^10\.\d+\.\d+\.\d+/', $line ) and 
						! preg_match ( '/^192\.168\.\d+\.\d+/', $line ) and 
						! preg_match ( '/^172\.1[6789]\.\d+\.\d+/', $line ) and
						! preg_match ( '/^172\.2[0-9]\.\d+\.\d+/', $line ) and
						! preg_match ( '/^172\.3[01]\.\d+\.\d+/', $line )
					)
					{
						$pub_ip = $match[0];
						#echo "Matched [$pub_ip]<br>";
					}
				}
			}
		}
	}
	else
	{
		echo "Meta data file is emply!";
	}
}
else
{
	echo "Meta data file missing or unreadable!";
}

echo "</td>";

if ( isset ($pub_ip) ) {
	echo "<td>";

	echo "<b>Location of public IP [$pub_ip]</b><br/>";

	require_once('geo/geoplugin.class.php');
	$geoplugin = new geoPlugin();
	$geoplugin->locate("$pub_ip");
	$long = $geoplugin->longitude;
	$lati = $geoplugin->latitude;
	#echo "long = $long <br>";
	#echo "lati = $lati <br>";
?>
	<iframe width="200" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;aq=3&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=5&amp;ll=<?php echo $lati ?>,<?php echo $long ?>&amp;output=embed"></iframe>
<?php
	echo "</td>";
}

echo "</tr>";
echo "</table>";

echo "</center></b>";

echo "<br/>";

?>

