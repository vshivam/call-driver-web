<?php
function getDistance($adr1, $adr2)
{
	$google_maps_key='AIzaSyD8CPngkZlmt6DcW9llc6nuCk8SNX_ToQo';
	$adr1 = urlencode($adr1);
	$adr2 = urlencode($adr2);
	$url1 = "http://maps.google.com/maps/geo?q=".$adr1."&output=xml&key=$google_maps_key";
	$url2 = "http://maps.google.com/maps/geo?q=".$adr2."&output=xml&key=$google_maps_key";
	$xml1 = simplexml_load_file($url1);
	$xml2 = simplexml_load_file($url2);
	$status1 = $xml1->Response->Status->code;
	$status2 = $xml2->Response->Status->code;
	if ($status1='200') 
	{ //address geocoded correct, show results
		foreach ($xml1->Response->Placemark as $node) 
		{ // loop through the responses
			$address = $node->address;
			$quality = $node->AddressDetails['Accuracy'];
			$coordinates = $node->Point->coordinates;
			$location = explode(",", $coordinates);
			$lon_1 = $location[0];
			$lat_1 = $location[1];
		}
	} 
	else 
	{ // address couldn't be geocoded show error message
		echo ("The address $adr could not be geocoded<br/>");
	}
	if ($status2='200') 
	{ //address geocoded correct, show results
		foreach ($xml2->Response->Placemark as $node) 
		{ // loop through the responses
			$address = $node->address;
			$quality = $node->AddressDetails['Accuracy'];
			$coordinates = $node->Point->coordinates;
			$location = explode(",", $coordinates);
			$lon_2 = $location[0];
			$lat_2 = $location[1];
		}
	} 
return distance($lat_1, $lon_1, $lat_2, $lon_2);
}
function distance($lat_1, $lon_1, $lat_2, $lon_2) 
{
	$earth_radius = 3960.00; # in miles
	$delta_lat = $lat_2 - $lat_1 ;
	$delta_lon = $lon_2 - $lon_1 ;
	$alpha    = $delta_lat/2;
	$beta     = $delta_lon/2;
	$a        = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($lat_1)) * cos(deg2rad($lat_2)) * sin(deg2rad($beta)) * sin(deg2rad($beta)) ;
	$c        = asin(min(1, sqrt($a)));
	$distance = 2*$earth_radius * $c;
	$distance = round($distance, 4);
	return $distance;
}

?>

