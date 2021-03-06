<?php

include 'menu.php';

echo "<b><center>";

$file = "/tmp/server.metadata";

#echo "<table>";
echo "<table border=3 cellpadding=8>";
echo "<tr>";
echo "<td valign='top'>";

if (file_exists($file)) {
	#readfile($file);
	$lines = file($file);
	// Loop through our array, show HTML source as HTML source; and line numbers too.
	if ( $lines )
	{
		echo "<b>Server meta-data:</b><br/><br/>";

		foreach ($lines as $line)
		{
			echo "<b>" . htmlspecialchars($line) . "</b><br />\n";

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
		echo "<b>Meta data file is emply!</b>";
	}
}
else
{
	echo "<b>Meta data file missing or unreadable!</b>";
}

echo "</td>";

if ( isset ($pub_ip) ) {
	echo "<td valign='top'>";

	require_once('geo/geoplugin.class.php');
	$geoplugin = new geoPlugin();
	$geoplugin->locate("$pub_ip");
	$long = $geoplugin->longitude;
	$lati = $geoplugin->latitude;

	if ( $geoplugin->countryName != "" or $geoplugin->city != "" )
	{
		echo "<b>Server location [$pub_ip]:</b><br/><br/>";
	}

	if ( $geoplugin->city != "" ) { echo "City: {$geoplugin->city} <br />\n"; }
	if ( $geoplugin->region != "" ) { echo "Region: {$geoplugin->region} <br />\n"; }
	#if ( $geoplugin->areaCode != "" ) { echo "Area Code: {$geoplugin->areaCode} <br />\n"; }
	#if ( $geoplugin->dmaCode != "" ) { echo "DMA Code: {$geoplugin->dmaCode} <br />\n"; }
	if ( $geoplugin->countryName != "" ) { echo "Country Name: {$geoplugin->countryName} <br />\n"; }
	if ( $geoplugin->countryCode != "" ) { echo "Country Code: {$geoplugin->countryCode} <br />\n"; }

	if ( $long != "" and $lati != "" )
	{
		echo "</td>";
		echo "<td valign='top'>";
?>
	<iframe width="300" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;aq=3&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=3&amp;ll=<?php echo $lati ?>,<?php echo $long ?>&amp;output=embed"></iframe>
<?php
	}

	echo "</td>";
}

echo "</tr>";
echo "</table>";

echo "</center></b>";

echo "<br/>";

?>

