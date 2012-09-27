<?php
require 'connect.php';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	define ("MAX_SIZE","200"); 
	
	$result = mysql_query("SELECT count(*) FROM driver_pro;");
	$row = mysql_fetch_array($result);
	$num_rows = $row[0];
	$id = $num_rows+1;

	function getExtension($str) 
	{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
	}
 
	$errors=0;
 	//reads the name of the file the user submitted for uploading
 	$image=$_FILES['image']['name'];
 	//if it is not empty
 	if ($image) 
 	{
		
		//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['image']['name']);
		//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
		//if it is not a known extension, we will suppose it is an error and 
        // will not  upload the file,  
		//otherwise we will do more tests
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
			//print error message
 			echo '<h1>Unknown extension!</h1>';
 			$errors=1;
 		}
 		else
 		{
			//get the size of the image in bytes
			//$_FILES['image']['tmp_name'] is the temporary filename of the file
			//in which the uploaded file was stored on the server
			$size=filesize($_FILES['image']['tmp_name']);
			if ($size > MAX_SIZE*1024)
			{
				echo '<h1>You have exceeded the size limit!</h1>';
				$errors=1;
			}

			//we will give an unique name, for example the time in unix time format
			$image_name=$id.'.png';
			//the new name will be containing the full path where will be stored (images folder)
			$newname="id_pic/".$image_name;
			//we verify if the image has been uploaded, and print error instead
			$copied = copy($_FILES['image']['tmp_name'], $newname);
			if (!$copied) 
			{
				$errors=1;
			}
		}
	}


//If no errors registred, print the success message
	
	$name = $_POST['name'];
	$dob = $_POST['dob'];
	
	if(!$_POST['address'])
	$address = "Address Not Provided";
	else
	{
	$address= $_POST['address'];
	}
	$mob_num=$_POST['mob_num'];

	if(isset($_POST['drinker']))
	{
		$drinker = "1";
	}
	else
	$drinker = "0";
	if(isset($_POST['smoker']))
	{
		$smoker = "1";
	}
	else
	$smoker = "0";

	$dl_num = $_POST['dl_num'];
	$dl_valid = $_POST['dl_valid'];

	if(isset($_POST['indigo']))
	{
		$indigo = "1";
	}
	else
	$indigo = "0";
	if(isset($_POST['honda']))
	{
		$honda = "1";
	}
	else
	$honda = "0";
	if(isset($_POST['amb']))
	{
		$amb = "1";
	}
	else
	$amb = "0";
	if(isset($_POST['innova']))
	{
		$innova = "1";
	}
	else
	$innova = "0";
	if(isset($_POST['sumo']))
	{
		$sumo = "1";
	}
	else
	$sumo = "0";
	if(isset($_POST['merc']))
	{
		$merc = "1";
	}
	else
	$merc = "0";
	if(isset($_POST['out_station_check']))
	{
	$out = "1";
	}
	else
	$out = "1";

	$min_rate = $_POST['min_rate'];
	$city= $_POST['city_pref_1'];
	if(isset($_POST['area_pref_1']))
	$area_pref_1 = $_POST['area_pref_1'];
	else
	$area_pref_1="";
	
	if(isset($_POST['area_pref_2']))
	$area_pref_2 = $_POST['area_pref_2'];
	else
	$area_pref_2="";

	if(isset($_POST['agent']))
	$agent=$_POST['agent'];
	else
	$agent="";

	$min_hours = $_POST['min_hours'];
	$busy = 0;
	$sql_update = "INSERT INTO driver_pro VALUES('$id','$dl_num','$dl_valid','$indigo','$honda','$amb','$innova','$sumo','$merc','$city','$area_pref_1','$area_pref_2','$out','$min_rate','null','$agent','$min_hours','$busy')";
	$sql_update_2 = "INSERT INTO driver_personal VALUES('$id','$name','$mob_num','$dob','$address','$smoker','$drinker')";
	if(mysql_query($sql_update,$con))
	{
	mysql_query($sql_update_2,$con);
	echo $address;
	//header( 'Location: thanks.php' ) ;
	}
	else
	echo "false";
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/register.css" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.21/themes/base/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
	<script language="javascript">
    function enableDisable(bEnable)
    {
		document.getElementById("area_pref_1").value = "";
         document.getElementById("area_pref_2").value = "";
         document.getElementById("area_pref_1").disabled = !bEnable;
         document.getElementById("area_pref_2").disabled = !bEnable;
    }
	function disable()
	{
		document.getElementById("area_pref_1").disabled = true;
         document.getElementById("area_pref_2").disabled = true;
		 document.getElementById("agent").style.display = 'none';
	}
	function visible(bEnable)
	{
		if(bEnable)
		document.getElementById("agent").style.display = 'block';
		else
		document.getElementById("agent").style.display = 'none';
	}
	function validate()
	{	
		var name = document.frm_driver.name.value;
		var dob = document.frm_driver.dob.value;
		var address = document.frm_driver.address.value;
		var mob_num = document.frm_driver.mob_num.value;
		var city_pref =document.frm_driver.city_pref_1.value;
		var dl_num = document.frm_driver.dl_num.value;
		var dl_valid =document.frm_driver.dl_valid.value;
		var min_rate =document.frm_driver.min_rate.value;
		
		if(name=="")
		{
			alert("Please Enter a Name !");
			return false;
		}if(dob=="")
		{
			alert("Please Enter a Date of Birth !");
			return false;
		}if(mob_num=="")
		{
			alert("Please Enter a Mobile Number !");
			return false;
		}if(city_pref=="")
		{
			alert("Please Enter a City Name !");
			return false;
		}if(dl_num=="")
		{
			alert("Please Enter a Driving License Number !");
			return false;
		}if(dl_valid=="")
		{
			alert("Please Enter the Validity of Your Driving License !");
			return false;
		}if(min_rate=="")
		{
			alert("Please Enter the Minimum Rate !");
			return false;
		}
	}
	
</script>

<script>
	$(document).ready(function() {       
		var cities = [
			"Patna",
			"Mumbai",
			"New Delhi",
			"Kolkata",
			"Chennai",
			"Bangalore",
			"Scheme"
		];
		var areas = [
			"Boring Road",
			"SK Puri",
			"Bomanhalli",
			"Rajendra Nagar",
			"Annasalai",
			"Linton Road",
			"Malviya Nagar"
		];
		$( "#city_pref_1" ).autocomplete({
			source: cities,
			minLength: 2
		});
		$( "#area_pref_1" ).autocomplete({
			source: areas,
			minLength : 0
		});
		$( "#area_pref_2" ).autocomplete({
			source: cities,
			minLength: 0
		});
      });  
</script>
<script>
$().ready(function() {

	$.ajax({
    url: "get_agent.php",
    success: function(data){
    prods = data.split(';');
	}
	});
	$("#agent").keyup(function(){
    $("#agent").autocomplete({
    source: prods
});
});
	
});

</script>
  <script>
  $(document).ready(function() {
    $("#tabs").tabs();
  });
  </script>
  
  <script>
	
	$(function() {
		
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "1940:2000",
			dateFormat: "yy-mm-dd"
		});
	});
	</script>
	
	<script>
	$(function() {
		$( "#dl_valid" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "2012:2050",
			dateFormat: "yy-mm-dd"
		});
	});
	</script>
	


</head>
<body onload="disable()" style="width:85%; min-width:1100px;">

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
			<li><a href="#fragment-1"><span>Register as a new Driver</span></a></li>
		</ul>
	<div id="fragment-1">
		<form name = "frm_driver" action="driver_reg.php" method="post" onsubmit = "return validate()" enctype="multipart/form-data">
			<div class="personal_info" style="float:left;width:48%;">

			</br>
			<div class="field">
				<label class="normal" for="name">Name :</label>
				<input type="text" class="input" name="name" id="name" />
			</div>	
			<div class="field">
				<label class="normal" for="dob">Date of Birth :</label>
				<input type="text"  class="input" name="dob" id="datepicker" />
			</div>	
			<div class="field">
				<label class="normal" for="address">Address :</label>
				<textarea type="text"  class="input" name="address" > </textarea>
			</div>
			<div class="field">
				<label class="normal" for="mob_num">Mob Num :</label>
				<input type="text" class="input" name="mob_num" id="name" />
			</div>	
			<div class="field">
				<label class="normal" for="pic">Display Pic :</label>
				<input type="file"  name="image" class="input" name="pic" />
			</div>
			
			<div class="field">
				<label class="normal" title="Leave unchecked for No" for="drinker">Drinker :</label>
				<input type="checkbox" title="Leave unchecked for No" class="input" name="drinker" />
			</div>	
			
			<div class="field">
				<label class="normal" for="smoker" title="Leave unchecked for No">Smoker :</label>
				<input type="checkbox"  title="Leave unchecked for No" class="input" name="smoker" />
			</div>
			
			<div style="width:100%;display:block;">
			<label class="normal"> Pick Up Point : </label>
			<div class="field" style="float:left;padding:10px; padding-bottom:0px;width:32%">
			<label class="normal" for="city_pref_1"> City :
			<input name="city_pref_1" id="city_pref_1" style="width:120px;"></input>
			
			</div>

			<div class="field" style="position:relative;float:left;padding:10px;padding-bottom:0px;width:32%">
			<label class="normal" for="city_pref_2" title="Select for Area Preferences"> Area Prefs ?
			<input type="checkbox" title="Select for Area Preferences" onclick="enableDisable(this.checked)"> </input>
			<input name="area_pref_1" id="area_pref_1" style="width:120px;margin:3px;"></input>
			<input name="area_pref_2" id="area_pref_2" style="width:120px;margin:3px;;"></input>
			</div>
			</div>
			</div>

				
			<div class="pro_info" style="float:right;width:48%">

			</br>
			<div class="field">
				<label class="normal" for="dl_num">DL Number :</label>
				<input type="text"  class="input" name="dl_num"/>
			</div>		
			<div class="field">
				<label class="normal" for="dl_valid">DL Valid till :</label>
				<input type="text"  class="input" name="dl_valid" id="dl_valid"/>
			</div>		
			<label class="normal">Cars Driven :</label>
			</br></br>
			<div class="field">
			<div class="chkleft" style="float:left;">
			<div class="field">
				<label class="normal" for="indigo">Indigo</label>
				<input type="checkbox"  class="input" name="indigo"/>
			</div>		
			<div class="field">
				<label class="normal" for="honda">Honda</label>
				<input type="checkbox"  class="input" name="honda"/>
			</div>		
			<div class="field">
				<label class="normal" for="innova">Innova</label>
				<input type="checkbox"  class="input" name="innova"/>
			</div>	
			</div>	
			
			<div class="chkright" style="float:right;margin-right:25%;">
			<div class="field">
				<label class="normal" for="amb">Ambassador</label>
				<input type="checkbox"  class="input" name="amb"/>
			</div>		
			<div class="field">
				<label class="normal" for="sumo">Sumo</label>
				<input type="checkbox"  class="input" name="sumo"/>
			</div>	
			<div class="field">
				<label class="normal" for="merc">Mercedes</label>
				<input type="checkbox"  class="input" name="merc"/>
			</div>	
			</div>	
			</div>
			
			<div class="field" style="padding-top:100px;">
				<label class="normal" for="min_rate">Minimum Rate  :</label>
				<input type="text"  class="input" name="min_rate" /> / Hour
			</div>
			
			<div class="field" style="display:block;">
				<label class="normal" for="min_rate">Outstation :</label>
				<input type="checkbox" class="input" name="out_station_check" />
			</div>
			
			<div class="field">
				<label class="normal" for="min_hours">Min Num of Hours :</label>
				<input type="text"  class="input" name="min_hours"/>
			</div>
			</br>
			
			<div class="field">
				<label class="normal" for="min_hours" title="Do You have an Agent ?">Have an Agent ?</label>
				<input type="checkbox"  class="input" onclick="visible(this.checked)" title="Do You have an Agent ?" name="min_hours"/>
				<input title="Enter Agent's Name" name="agent" style="float:right;width:135px;margin-right:200px; position:relative" type="text" id="agent"/>
			</div>
			</div>

			

			<center>	<input type="submit" class="css3button" value="Register" />	 </center>
		
			</form>
		</div>
		</div>
</body>
</html>