<?php
require 'connect.php';
$result = mysql_query("SELECT * from agent");
while($row = mysql_fetch_array($result))
{	
	echo $row['name'].";";
}
?>
