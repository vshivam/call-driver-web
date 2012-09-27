<?php
require 'connect.php';

$result = mysql_query("SELECT count(*) FROM driver_pro");
$row = mysql_fetch_array($result);
$num_rows = $row[0];
$id = $num_rows+1;

$name = $_POST['name'];
$dl_num = $_POST['dl_num'];
$dl_valid = $_POST['dl_valid'];
$city = $_POST['city'];
$mon = $_POST['mon'];
$mob_num = $_POST['mob_num'];
if($mon = "January")
$mon = 1;
if($mon = "February")
$mon = 2;
if($mon = "March")
$mon = 3;
if($mon = "April")
$mon = 4;
if($mon = "May")
$mon = 5;
if($mon = "June")
$mon = 6;
if($mon = "July")
$mon = 7;
if($mon = "August")
$mon = 8;
if($mon = "September")
$mon = 9;
if($mon = "October")
$mon = 10;
if($mon = "November")
$mon = 11;
if($mon = "December")
$mon = 12;
echo $mon;
$dl_valid = $mon."-".$dl_valid;

$sql_update = mysql_query("INSERT INTO driver_pro VALUES('$id','$dl_num','$dl_valid','1','1','1','$1','1','1','$city','none','none','1','N/A','null','N/A','N/A','0')");
$sql_update_2 = mysql_query("INSERT INTO driver_personal VALUES('$id','$name','$mob_num','N/A','N/A','N/A','N/A')");

?>