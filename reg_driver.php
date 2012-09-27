<?php
require "connect.php";


	define ("MAX_SIZE","100"); 
	
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
				echo '<h1>Copy unsuccessfull!</h1>';
				$errors=1;
			}
		}
	}


//If no errors registred, print the success message
	if(isset($_POST['Submit']) && !$errors) 
	{
		echo "<h1>File Uploaded Successfully! Try again!</h1>";
	}


	$name = $_POST['name'];
	$dob = $_POST['dob'];
	$address= $_POST['address'];
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


	$sql_update = "INSERT INTO driver_pro VALUES('$id','$dl_num','$dl_valid','$indigo','$honda','$amb','$innova','$sumo','$merc','$city','$area_pref_1','$area_pref_2','$out','$min_rate','null','$agent')";
	$sql_update_2 = "INSERT INTO driver_personal VALUES('$id','$name','$mob_num','$dob','$address','$smoker','$drinker')";
	if(mysql_query($sql_update,$con))
	mysql_query($sql_update_2,$con);
	else
	echo "false";

?>