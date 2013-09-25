<?PHP 
$link=mysql_connect("vishvaclientssha.db.5451442.hostedresource.com","vishvaclientssha","Index@123") or die ("couldnot connect to server");

//$link=mysql_connect("localhost","root","") or die ("couldnot connect to server");

if (!$link) {
die('Could not connect: ' . mysql_error());
}
$dbname="vishvaclientssha";
mysql_select_db('vishvaclientssha');

?>