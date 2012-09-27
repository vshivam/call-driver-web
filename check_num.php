<?php
require 'connect.php';
$num = $_GET['num'];
$query = mysql_query("SELECT count(*) FROM driver_personal where mobile_num = ".$num);
$row = mysql_fetch_array($query);
$count = $row[0];
echo $count;
?>