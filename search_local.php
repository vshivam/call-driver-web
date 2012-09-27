<html>
<head>

  <link rel="stylesheet" type="text/css" href="css/search_local.css" />
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.21/themes/base/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

  <script>
  $(document).ready(function() {
	
    $("#tabs").tabs();
  });
  </script>
  </head>
	<body style="width:85%; min-width:1100px;">

	<div class="header">
		<font class="header_font" style="font-size:0.9em;">Get in Touch :<b> +91 9999444422</b></font>
	</div>

	
	<div class="shadow_box">
		<div class="logo" style="position:relative; float:left;">
		<img src="images/logo.png"></img>
		</div>
		<div class="menu_text" style="position:relative; float:right;">
		</br>
		</br>
		<ol><li class="menu"><a href="contact_us.php">Contact Us</a></li>
			<li class="menu"> | 
			</li><li class="menu"><a href="agent_login.php">Agent Section</a></li>
			<li class="menu"> | </li>
			<li class="menu"><a href="driver_reg.php">Driver Section</a></li>
			<li class="menu"> | </li>
			<li class="menu"><a href="index.php">Home</a></li>
		</ol>
		</div>
	</div>
	<div id="tabs" style="height:480px;">
		<ul>
			<li><a href="#fragment-1"><span>Search Results</span></a></li>
		</ul>
	<div id="fragment-1">
	</body>
</html>

<?php
require "connect.php";
require "functions.php";
$user_city = $_POST['user_city'];
$user_area = $_POST['user_area'];
$radius = $_POST['radius'];
$radius = intval($radius);
$car = $_POST['car'];
$user_loc = $user_city.','. $user_area;
//$max_rate = $_POST['max_rate'];



function age($dob) {

    $dob = strtotime($dob);
    $y = date('Y', $dob);
   
    if (($m = (date('m') - date('m', $dob))) < 0) {
        $y++;
    } elseif ($m == 0 && date('d') - date('d', $dob) < 0) {
        $y++;
    }
   
    return date('Y') - $y;
   
}
//echo $user_loc."</br>";
if(strcmp($car, "other") == 0)
{
	$car=1;
}
//echo $car."car";

$sql_search = "SELECT * FROM driver_pro WHERE ($car ='1') AND (city = '$user_city')";
$result = mysql_query($sql_search);

$query = mysql_query("SELECT * FROM driver_pro WHERE ($car ='1') AND (city = '$user_city')");
$row = mysql_fetch_array($query);
$num_rows = $row[0];
//echo "num rows = ".$num_rows ."</br>";
if($num_rows ==0)
{
	echo "<center style=\"font-size:30px;color:#7EA107;\"> <b> Oops ! </b></center>";
	echo "</br>";
	echo "<center> No Drivers were found available for this route. Please get in touch with our Call Center for further assistance. </center>";
	echo "</br>";
	echo "</br>";
	echo "<center> <a href=\"index.php\"> Go Back To Search Page </a> </center>";
	echo "<center><hr style=\"width:50%;\"></center>";
}
else{
$i=0;
$drivers = array();
echo '<table class="zebra" style="width:100%;">';
echo"<thead><tr> <td><b> Name </td> <td><b> Age </td><td><b> Mobile Number </td> <td><b> Rate / Hour </td> <td> <b>Smoker </td><td><b> Drinker </td><td><b> Driver's Distance from </br>Pick Up Point</b></td></tr></thead>";
while($row_1 = mysql_fetch_array($result))
{

	//echo $row_1['driver_id']."</br>";
	$query_personal = mysql_query("SELECT * FROM driver_personal where id = '$row_1[driver_id]'");
	$row_2 = mysql_fetch_array($query_personal);
	
	if($row_2['smoker']==1)
	$smoker = "Yes";
	else
	$smoker = "No";
	
	if($row_2['drinker']==1)
	$drinker = "Yes";
	else
	$drinker = "No";
	
	$curr_age =  age($row_2['dob']);
	
	$link = "href=\"profile.php?id=".$row_2['id']."\"";
	

	if($row_1['curr_loc'] == "null")
	{
	$dist = 100;
	}
	else
	{
	$dist = (getDistance($row_1['curr_loc'], $user_loc))*1.6;
	}
	
	$array[$i]['name'] = $row_2['name'];
	$array[$i]['curr_age'] = $curr_age;
	$array[$i]['mobile_num'] = $row_2['mobile_num'];
	$array[$i]['min_rate'] = $row_1['min_rate'];
	$array[$i]['smoker']= $smoker;
	$array[$i]['drinker']= $drinker;
	$array[$i]['dist'] = $dist;
	$array[$i]['link'] = $link;
	$i=$i+1;
	
}
	function sortTwoDimensionArrayByKey($arr, $arrKey, $sortOrder=SORT_ASC)
	{
		foreach ($arr as $key => $row)
		{
			$key_arr[$key] = $row[$arrKey];
		}
		array_multisort($key_arr, $sortOrder, $arr);
		return $arr;
	}
	
	$result = sortTwoDimensionArrayByKey($array,'dist');
	
	$array_size = count($result);
	for($i = 0; $i < $array_size; $i++)
	{
		
		
		echo "<tr> <td> <a ".$result[$i]['link'].">". $result[$i]['name']." </a></td><td> ".$result[$i]['curr_age']."</td><td> +91 ".$result[$i]['mobile_num']." </td> <td><img style=\"padding-right:5px;\" src=\"images/rupee.png\"/>".$result[$i]['min_rate']."</td> <td>".$result[$i]['smoker'] ."</td><td> ".$result[$i]['drinker']."</td><td>".$result[$i]['dist']."</td></tr>";

	}
	


}
echo "</table>";
?>