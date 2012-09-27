<?php
$num = $_POST['num'];
$lat = $_POST['lat'];
$long = $_POST['long'];


$api_key = "AIzaSyD8CPngkZlmt6DcW9llc6nuCk8SNX_ToQo";
// format this string with the appropriate latitude longitude
$url = 'http://maps.google.com/maps/geo?q='.$lat.','.$long.'&output=json&sensor=true_or_false&key=' . $api_key;
// make the HTTP request
$data = @file_get_contents($url);
// parse the json response
$jsondata = json_decode($data,true);
// if we get a placemark array and the status was good, get the addres
if(is_array($jsondata )&& $jsondata ['Status']['code']==200)
{
      $addr = $jsondata ['Placemark'][0]['address'];
}
echo $addr;

require 'connect.php';

$query1 = mysql_query("SELECT * from driver_personal where mobile_num = '".$num."'");
$row = mysql_fetch_array($query1);
$id = $row['id'];
$query = "UPDATE driver_pro SET curr_loc ='". $addr ."' where driver_id='".$id."'";
$query2 = mysql_query($query) or die(mysql_error()) ;
?>