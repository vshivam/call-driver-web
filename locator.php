<?php
require 'connect.php';
$city_check = $_GET['city_check'];
$result = mysql_query("SELECT * from cities where city_name like '$city_check%'");
while($row = mysql_fetch_array($result))
{	
	$cn = $row['city_name'];
	echo '$cn\n';
}
?>
