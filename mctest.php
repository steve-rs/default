<?php

include 'meta.php';
require_once 'configure.php';

if ( ! isset($memcache_server) )
{
    die("Memcache server hostname not set ... aborting.");
}
 
$file = "/var/spool/cloud/meta-data/instance-id";
if (file_exists($file)) {
    readfile($file);
}

$t1 = microtime(true);

$memcache = new Memcache;
$memcache->connect($memcache_server, 11211) or die ("Could not connect to $memcache_server");

$v = htmlspecialchars($_GET["v"]);
$c = htmlspecialchars($_GET["c"]);
$s = htmlspecialchars($_GET["s"]);

if (! isset($v)) $v = 1;      		# Value
if (! isset($c)) $c = 9999999;  	# Count
if (! isset($s)) $s = 0.487439874;      # Step

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

