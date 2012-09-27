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
	<body style="width:85%; min-width:1000px;">

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
			<li><a href="#fragment-1"><span>Profile</span></a></li>
		</ul>
	<div id="fragment-1">


	<?php
	require 'connect.php';
	$id= $_GET['id'];
	$query_pro = mysql_query("SELECT * from driver_pro where driver_id = $id");
	$query_personal = mysql_query("SELECT * from driver_personal where id = $id");
	$row_1=mysql_fetch_array($query_pro);
	$row_2=mysql_fetch_array($query_personal);
	?>		
			
			<div class="personal_info" style="float:left;width:48%;">
			<div class="img" style="float:right;width:20%;overflow:hidden;">
			<?php echo "<img alt=\"Pic Not Found\" src=\"id_pic/".$id.".png\">" ?>
			</div>
			
			
			<div style="width:80%;float:left;">
			<div class="field">
				<label class="normal" for="name" ">Name :</label>
				<label class="value" for="name" "><?php echo $row_2['name'] ?></label>
				
			</div>	
			<div class="field">
				<label class="normal" for="dob">Date of Birth :</label>
				<label class="value" for="name"><?php echo $row_2['dob'] ?></label>
			</div>	
			<div class="field">
				<label class="normal" for="address">Address :</label>
				<label class="value" for="name"><?php echo $row_2['address'] ?></label>
			</div>
			<div class="field">
				<label class="normal" for="mob_num">Mob Num :</label>
				<label class="value" for="name"><?php echo $row_2['mobile_num'] ?></label>
			</div>	
			
			
			<div class="field">
				<label class="normal" for="drinker">Drinker :</label>
				<label class="value" ><?php if($row_2['smoker']=1)
														echo "Yes";
														else "No";
				?></label>
			</div>	
			
			<div class="field">
				<label class="normal" for="drinker">Smoker :</label>
				<label class="value" ><?php if($row_2['drinker']=1)
														echo "Yes";
														else "No";
				?></label>
			</div>	
			
		

			<div style="clear:both;height:10px;"> </div>
			<div class="field">
			<label class="normal" for="city_pref_1"> City : </label> <label class="value"><?php echo $row_1['city'] ?>	</label>
			</div>
			
			<div class="field">
			<label class="normal" >Area Prefs :</label> <label class="value" > <?php if ($row_1['pref_2']!="")
																						echo $row_1['pref_1'].", ".$row_1['pref_2'];
																						else
																						echo $row_1['pref_1'];?> </label>
			</div>
			<div style="clear:both;height:10px;"> </div>
			<div class="field">
				<label class="normal" for="dl_num">DL Number :</label>
				<label class="value" for="name"><?php echo $row_1['dl_num'] ?></label>
			</div>		
			<div class="field">
				<label class="normal" for="dl_valid">DL Valid till :</label>
				<label class="value" for="name"><?php echo $row_1['dl_valid'] ?></label>
			</div>		
			<div class="field">
				<label class="normal" for="min_hours" title="Do You have an Agent ?">Agent's Name :</label>
				<label class="value" for="indigo"><?php if($row_1['agent']="null")
														echo "None";
														else
														echo $row_1['agent'];
														?></label>
			</div>
			</div>
			</div>

				
			<div class="pro_info" style="float:right;width:48%">

			</br>
			
			<label class="normal">Cars Driven :</label>
			</br></br>
			
			
			<div class="field">
				<label class="normal" for="indigo">Indigo :</label><label class="value" for="indigo"><?php if($row_2['indigo']=1)
																			echo "Yes";
																			else
																			echo "No"; ?></label>
			</div>		
			<div class="field">
				<label class="normal" for="indigo">Honda :</label><label class="value" for="indigo"><?php if($row_2['honda']=1)
																			echo "Yes";
																			else
																			echo "No"; ?></label>
			</div>			
			<div class="field">
				<label class="normal" for="indigo">Innova :</label><label class="value" for="indigo"><?php if($row_2['innova']=1)
																			echo "Yes";
																			else
																			echo "No"; ?></label>
			</div>	
			
			
			<div class="field">
				<label class="normal" for="indigo">Sumo :</label><label class="value" for="indigo"><?php if($row_2['sumo']=1)
																			echo "Yes";
																			else
																			echo "No"; ?></label>
			</div>		
			<div class="field">
				<label class="normal" for="indigo">Mercedes :</label><label class="value" for="indigo"><?php if($row_2['merc']=1)
																			echo "Yes";
																			else
																			echo "No"; ?></label>
			</div>		
			<div style="clear:both;"></div>
			</br></br>
			<div class="field" >
				<label class="normal" for="min_rate">Minimum Rate  :</label>
				<label class="value" for="name"><?php echo $row_1['min_rate'] ?></label>
			</div>
			<div class="field">
				<label class="normal" for="min_rate">Outstation :</label>
				<label class="value" for="indigo"><?php if($row_2['outstation']=1)
																			echo "Yes";
																			else
																			echo "No"; ?></label>
			</div>
			<div class="field">
				<label class="normal" for="min_hours">Min Num of Hours :</label>
				<label class="value" for="indigo"><?php echo $row_1['min_hours']?></label>
			</div>
			</div>
			
			
			
			
			
			
			</br>
			
			
	</div>
	
		
		
	</div>
	</body>
</html>