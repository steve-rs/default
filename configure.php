# Demo app configuration

# Set this to the public FQDN of the memcached server which has an EIP attached to it.
# Use an EIP so this value will never change. From the app server, this will resolve to the private IP.
$memcache_server = "ec2-107-20-207-192.compute-1.amazonaws.com";

