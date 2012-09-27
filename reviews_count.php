<?php
require 'connect.php';
$result = mysql_query("SELECT count(*) from reviews");
while($row = mysql_fetch_array($result))
{	
	echo $row[0];
}
?>
