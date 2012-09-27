<html>
<head>

  <link rel="stylesheet" type="text/css" href="css/profile.css" />
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
	<body style="width:80%; min-width:1000px;">

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
			<li><a href="#fragment-1"><span>Drivers Under You</span></a></li>
		</ul>
		<div id="fragment-1">
	<?php
	require 'connect.php';
	$mob_num = $_GET['mob_num'];
	$query = mysql_query("SELECT name FROM `agent` WHERE mobile_num like $mob_num");
	$row = mysql_fetch_array($query);
	$name= $row['name'];	
	$query_2= mysql_query("SELECT * FROM driver_pro where agent ='". $name."'");
	
	echo '<table class="zebra" style="width:100%;">';
	echo"<thead><tr> <td><b> Name </td> <td><b> Dl Number </td><td><b> DL Validity </td> <td><b> Rate / Hour </td> <td> <b>Current Location </td><td><b> Minimum Hours </td><td><b> Busy Status</b></td></tr></thead>";
	
	while($row_2 = mysql_fetch_array($query_2))
	{	$id = $row_2['driver_id'];
		$query3= mysql_query("SELECT * from driver_personal where id like $id");
		$row3=mysql_fetch_array($query3);
		$query4= mysql_query("SELECT * from driver_pro where driver_id like $id");
		$row4=mysql_fetch_array($query4);
		if($row4['busy']==1)
		$busy = "Yes";
		else
		$busy = "No";
		echo"<thead><tr> <td>". $row3['name']." </td> <td>" .$row4['dl_num']."</td><td> " .$row4['dl_valid']." </td> <td> " .$row4['min_rate']." </td> <td> " .$row4['curr_loc']." </td><td> " .$row4['min_hours']." </td><td>" .$busy."</td></tr></thead>";}
	?>
		</div>
	</div>
	
</body>
</html>
	