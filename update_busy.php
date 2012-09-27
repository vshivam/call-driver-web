<?php
require 'connect.php';

$num = $_GET['num'];
$busy = $_GET['busy'];
$query1 = mysql_query("SELECT * from driver_personal where mobile_num = '".$num."'")or die("MySQL ERROR: ".mysql_error());
$row = mysql_fetch_array($query1);
$id = $row['id'];
$query = "UPDATE driver_pro SET busy ='". $busy ."' where driver_id='".$id."'";
$query2 = mysql_query($query) or die(mysql_error()) ;
?>