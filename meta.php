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
        foreach ($lines as $line) {
            echo htmlspecialchars($line) . "<br />\n";
        }
	if ( ! isset ( $pub_ip ) ) {
		if ( preg_match ( '\d+\.\d+\.\d+\.\d+/', $line ) ) {
#int preg_match ( string $pattern , string $subject
			$pub_ip = $line;
			echo "Matched [$line]";
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
	require_once('geo/geoplugin.class.php');
	$geoplugin = new geoPlugin();
	$geoplugin->locate($pub_ip);
?>
	<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;aq=3&amp;sspn=40.188298,79.101563&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=7&amp;ll=<?php $geoplugin->longitude ?>,<?php $geoplugin->latitude ?>&amp;output=embed"></iframe>
<?php
}

require_once('geo/geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate("23.20.26.42");
?>
<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;aq=3&amp;sspn=40.188298,79.101563&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=7&amp;ll=<?php $geoplugin->longitude ?>,<?php $geoplugin->latitude ?>&amp;output=embed"></iframe>
<?php

echo "</center></b>";

echo "<br/>";

?>

