echo "<p>"
for f in *.php
do
  f=`basename $f .php`
  echo "| <a href=\"$f\">$f</a> "
done
echo "|"
f=haproxy-status
echo "| <a href=\"$f\">$f</a> "
echo "|"
echo "</p>"
