<?php

include 'meta.php';

$file = "/var/spool/cloud/meta-data/instance-id";
if (file_exists($file)) {
    ob_clean();
    flush();
    readfile($file);
}

$t1 = microtime(true);

$mc = "ec2-107-20-207-192.compute-1.amazonaws.com";  # This is an EIP, so it will "never change"
$memcache = new Memcache;
$memcache->connect($mc, 11211) or die ("Could not connect to $mc"); //connect to memcached server

$v = htmlspecialchars($_GET["v"]);
$c = htmlspecialchars($_GET["c"]);
$s = htmlspecialchars($_GET["s"]);

//$v = 1;      # Value
//$c = 9999999; # Count
//$s = 0.487439874;      # Step

$key = $v . "-" . $c . "-" . $s;

print "Key = $key\n";

$get_result = $memcache->get( $key ); //retrieve your data
//var_dump($get_result); //show it

if ( $get_result != false )
{
        print "Value from cache = ";
        print $get_result . "\n";
} else {
        print "Calculating = ";
        for ( $i = 0; $i < $c; $i++ )
        {
                $v = $v + $s;
        }
        print $v . "\n";

        $memcache->set($key, $v, false, 100); //add it to memcached server
}

$t2 = microtime(true);

print '<p>';
print "Duration in microseconds = " . ( $t2 - $t1 ) . "\n";

?>

