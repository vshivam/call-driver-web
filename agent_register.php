<?php
require 'connect.php';
if($_SERVER['REQUEST_METHOD'] == "POST") 
{
	$agent_name = $_POST['agent_name'];
	$agent_num = $_POST['agent_num'];
	$pwd = md5($_POST['pwd']);
	echo $pwd;
	$agent_email = $_POST['agent_email'];
	$org = $_POST['org'];
	$address = $_POST['address'];
	$sql = "INSERT INTO agent VALUES('$agent_name','$agent_num','$pwd','$agent_email','$org','$address')";
	mysql_query($sql);
}


?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/jquery.css" />
  <link rel="stylesheet" type="text/css" href="css/index.css" />
  <link rel="stylesheet" type="text/css" href="css/checkbox.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#tabs").tabs();
  });
  </script>
  <script>
  
      $(document).ready(function() {  
      
            //the min chars for username  
            var min_chars = 10;  
      
            //result texts  
            var characters_error = 'Please Check Your Phone Number';
            var checking_html = 'Checking...';  
      
            //when button is clicked  
            $('#agent_num').blur(function(){  
                //run the character number check  
                if($('#agent_num').val().length < min_chars){  
                    //if it's bellow the minimum show characters_error text '  
                    $('#username_availability_result').html(characters_error);  
                }else{  
                    //else show the cheking_text and run the function to check  
                    $('#username_availability_result').html(checking_html);  
                    check_availability();  
                }  
            });  
      
      });  
      
    //function to check username availability  
    function check_availability(){  
      
            //get the username  
            var agent_num = $('#agent_num').val();  
			 $('#username_availability_result').html(agent_num);  
            //use ajax to run the check  
            $.post("check_username.php", { mob_num_check: agent_num },  
                function(result)
				{  
                    if(result == 1)
					{   
                        $('#username_availability_result').html('Mobile number is Available');  
                    }
					else
					{  
                        $('#username_availability_result').html('This Mobile Number is already registered. Please Change. ');  
                    }  
            });  
      
    }  
  </script>
  <script type="text/javascript">
	function validity()
	{
		var agent_name = document.agent_reg_frm.agent_name.value;
		var pwd = document.agent_reg_frm.pwd.value;
		var cnfpwd = document.agent_reg_frm.cnfpwd.value;
		var agent_num = document.agent_reg_frm.agent_num.value;
		var agent_email = document.agent_reg_frm.agent_email.value;
		var org = document.agent_reg_frm.org.value;
		var address = document.agent_reg_frm.address.value;
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(agent_name=="")
		{
			alert("Please Enter your Name !");
			return false;
		}
		if(agent_num=="")
		{
			alert("Please Enter your Mobile Num !");
			return false;
		}
		if(pwd=="")
		{
			alert("Please enter your Password !");
			return false;
		}
		if(cnfpwd=="")
		{
			alert("Please enter your Password again !");
			return false;
		}
		if(pwd!=cnfpwd)
		{
			alert("The Password Fields do not match !");
			return false;
		}
		if(!(reg.test(agent_email)))
		{
			alert("Please Enter a Valid Email ID !");
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
			<li id="tab_1"><a href="#fragment-1"><span>Agent Registration</span></a></li>
		</ul>
		<div id="fragment-1">
		
			<form name="agent_reg_frm" action='agent_register.php' onsubmit="return validity()" method="post">       
				<div class="shadow_boxG" style="margin:auto;">
				
					<div class="field">
						<label class="normal" for="agent_name">Name</label>
						<input type="text" id="agent_name" name="agent_name">
					</div>
					<div class="field">
						<label class="normal" for="agent_num">Mobile Number</label>
						<input id="agent_num" name="agent_num">

						
					</div>
					
					<div class="field">
						<label class="normal" for="agent_email">Email </label>
						<input id="agent_email" name="agent_email">
					</div>
					
					<div class="field">
						<label class="normal" for="address">Address</label>
					<textarea type="text"  class="input" name="address" > </textarea>
					</div>
					
					<div class="field">
						<label class="normal" for="org">Organisation</label>
						<input type="text" id="org" name="org">
					</div>
					
					<div class="field">
						<label class	="normal" for="pwd">Password </label>
						<input type="password" id="pwd" name="pwd">
					</div>
					<div class="field">
						<label class="normal" for="cnf_pwd">Confirm Pwd</label>
						<input type="password" id="cnf_pwd" name="cnfpwd">
					</div>
				</br>
				</br>
				<hr>
				<center><div style="color:#FF0000;"class="field" id="username_availability_result" >
					</div>
					</center>
				
						
							

			<center><input class="css3button" type="submit" value="Register"></center>
		</div>
		</form>
		
		</div>
	
    
			
	
    </div>
	

</body>
</html>