<?php
require 'connect.php';
$source = $_GET['city_source'];
$destn = $_GET['city_destn'];
$doj = $_GET['doj'];
$seats = $_GET['seats'];
$mob_num = $_GET['mob_num'];

$query = mysql_query("INSERT INTO itinerary VALUES('$source','$destn','$doj','$seats','$mob_num')");

?>
