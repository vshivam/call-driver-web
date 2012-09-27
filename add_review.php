<?php
require 'connect.php';
$name = $_GET['name'];
$email = $_GET['email'];
$rev = $_GET['rev'];
$row=mysql_fetch_array(mysql_query("select count(*) from reviews"));
$id=$row[0];
echo $id;
$sql = mysql_query("INSERT INTO reviews VALUES ('$id','$name','$email','$rev')");

?>