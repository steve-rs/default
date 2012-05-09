<?php

$memcache = new Memcache;
$memcache->connect('ec2-23-22-89-24.compute-1.amazonaws.com', 11211) or die ("Could not connect"); //connect to memcached server
 
$v = 1;      # Value
$c = 9999999; # Count
$s = 0.487439874;      # Step

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
 
?>

