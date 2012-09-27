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
			<li><a href="#fragment-1"><span>Contact Us</span></a></li>
		</ul>
		<div id="fragment-1" style="margin-left:20%">
			<form>
			
				<div class="field">
					<label class="normal" for="name">Name :</label>
					<input type="text" class="input" name="name"/>
				</div>	
			
				<div class="field">
					<label class="normal" for="name">Email ID :</label>
					<input type="email" class="input" name="email"/>
				</div>	
			
				<div class="field">
					<label class="normal" for="name">Message :</label>
					<textarea style="height:180px;width:300px;" type="text" class="input" name="message"> </textarea>
				</div>
				<div class="field">
				<input class="css3button" style="width:125px;margin-left:250px;" type="submit" value="Send Message"/>
				</div>
			</form>
		</div>
		</div>
	</body>
</html>
		