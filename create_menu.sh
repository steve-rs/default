echo "<p>"
for f in *.php
do
  d=`basename $f .php`
  echo "| <a href=\"$f\">$d</a> "
done
f=haproxy-status
echo "| <a href=\"$f\">$f</a> "
echo "|"
echo "</p>"
