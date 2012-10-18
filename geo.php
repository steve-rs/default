<html>
<head>
<title>Demo App</title>
</head>
<body>

<!--<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Santa+Barbara,+CA,+United+States&amp;aq=3&amp;oq=Santa+&amp;sll=37.0625,-95.677068&amp;sspn=40.188298,79.101563&amp;ie=UTF8&amp;hq=&amp;hnear=Santa+Barbara,+California&amp;t=m&amp;z=13&amp;ll=34.42083,-119.69819&amp;output=embed"></iframe>

<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;aq=3&amp;sll=44.4444,-55.555555&amp;sspn=40.188298,79.101563&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=5&amp;ll=44.44444,-55.55555&amp;output=embed"></iframe>
-->

<?php
require_once('geo/geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate("23.20.26.42");
?>

<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;aq=3&amp;sspn=40.188298,79.101563&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=7&amp;ll=<?php $geoplugin->longitude ?>,<?php $geoplugin->latitude ?>&amp;output=embed"></iframe>

<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;aq=3&amp;sspn=40.188298,79.101563&amp;ie=UTF8&amp;hq=&amp;t=m&amp;z=7&amp;ll=39.043701171875,-77.487503051758&amp;output=embed"></iframe>

<br />

</body>
</html>
