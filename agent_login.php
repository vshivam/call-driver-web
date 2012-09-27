<?php
require 'connect.php';
if($_SERVER['REQUEST_METHOD'] == "POST") 
{
	$agent_num = $_POST['mob_num'];
	$pwd = md5($_POST['password']);
	$sql = "SELECT COUNT(*) FROM agent where mob_num = '$agent_num' AND '$pwd' = pwd";
	$result = mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($row[0]==1)
	{
		header( 'Location: agent_profile.php?mob_num='.$agent_num ) ;
	}
}


?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
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
  
  <script type="text/javascript">
	function validity()
	{
		var mob_num=document.frm_local.mob_num.value;
		var password=document.frm_local.password.value;
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(mob_num=="")
		{
			alert("Please Enter your Mobile Number !");
			return false;
		}
		if(password=="")
		{
			alert("Please enter your Password!");
			return false;
		}
	}
</script>
  <style>
	div.shadow_boxG {
	padding:10px;

	margin: 0;
	height: 80.5%;
	width:35%;
	}
</style>
</head>


<body style="width:80%; min-width:1000px;">

	<div class="header">
		<font class="header_font" style="font-size:0.9em;">Get in Touch :<b> +91 9999444422</b></font>
	</div>

	
	<div class="shadow_box">
		<div class="logo" style="position:relative; float:left;">
		<a href="index.php"><img src="images/logo.png"></img></a>
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
			<li id="tab_1"><a href="#fragment-1"><span>Agent Login</span></a></li>
		</ul>
		<div id="fragment-1">
		
			<form name='frm_local' onsubmit="return validity()" action='agent_login.php' method="post">       
				<div class="shadow_boxG" style="margin:auto;">

				
					<div class="field">
						<label class="normal" for="user_city">Mobile Number</label>
						<input id="user_city" name="mob_num">
					</div>
					
					<div class="field">
						<label class="normal" for="user_area">Password </label>
						<input type="password" id="password" name="password">
					</div>
				</br>
				</br>
				<center><a href="agent_register.php" style="color:#7EA107; font-size:0.8em;" > New Agent ? Register Here </a></center>
				<hr>

				
						
							

			<center><input class="css3button" type="submit" value="Login"></center>
		</div>
		</form>
		
		</div>
	
    
			
	
    </div>
	

</body>
</html>