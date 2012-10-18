<?php

include 'menu.php';

echo "<b><center>";

$file = "/tmp/server.metadata";

if (file_exists($file)) {
	#readfile($file);
	$lines = file($file);
	// Loop through our array, show HTML source as HTML source; and line numbers too.
	if ( $lines )
	{
		foreach ($lines as $line)
		{
			echo htmlspecialchars($line) . "<br />\n";
			if ( ! isset ( $pub_ip ) )
			{
				if ( preg_match ( '/^\d+\.\d+\.\d+\.\d+/', $line, $match ) )
				{
					if ( ! preg_match ( '/^10\.\d+\.\d+\.\d+/', $line ) )
					{
						$pub_ip = $match[0];
						echo "Matched [$pub_ip]<br>";
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

if ( isset ($pub_ip) ) {
	echo "pub ip = [$pub_ip] <br>";
	require_once('geo/geoplugin.class.php');
	$geoplugin = new geoPlugin();
	$geoplugin->locate("$pub_ip");
	$long = $geoplugin->longitude;
	$lati = $geoplugin->latitude;
	echo "long = $long <br>";
	echo "lati = $lati <br>";
?>
	<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;sll=&amp;sspn=&amp;aq=3&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=7&amp;ll=<?php echo $long ?>,<?php echo $lati ?>&amp;output=embed"></iframe>
<?php
}

echo "</center></b>";

echo "<br/>";

?>

