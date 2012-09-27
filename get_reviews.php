<?php
$id = $_GET['id'];
require 'connect.php';
$result = mysql_query("SELECT * from reviews where id= '$id'");
while($row = mysql_fetch_array($result))
{	
	echo $row['name'].";".$row['review'];
}
?>