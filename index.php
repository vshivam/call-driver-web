<html>
<head>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.21/themes/base/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
  <style>
	#slideshow { 
    position: relative; 
    width: 100%px; 
    height: 240px; 
	}

	#slideshow > div { 
    position: absolute; 
	top: 10px; 
    left: 10px; 
    right: 10px; 
    bottom: 10px; 

}
</style>

<script>  
  $(function() {
		
			$("#slideshow > div:gt(0)").hide();
	
			setInterval(function() { 
			  $('#slideshow > div:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#slideshow');
			},  5000);
			
		});

</script>
  <script>
  
 
	$(document).ready(function() {       
		var cities = [
			"Patna",
			"Mumbai",
			"New Delhi",
			"Kolkata",
			"Chennai",
			"Bangalore"
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
		$( "#user_city" ).autocomplete({
			source: cities,
			minLength: 2
		});
		$( "#user_area" ).autocomplete({
			source: areas,
			minLength : 0
		});
		$( "#city_source" ).autocomplete({
			source: cities,
			minLength: 0
		});
		$( "#city_destn" ).autocomplete({
			source: cities,
			minLength: 0
		});
		$( "#area_source" ).autocomplete({
			source: areas,
			minLength : 0
		});
		$( "#add_city_source" ).autocomplete({
			source: cities,
			minLength: 0
		});
		$( "#add_city_destn" ).autocomplete({
			source: cities,
			minLength: 0
		});
		$( "#search_city_destn" ).autocomplete({
			source: cities,
			minLength: 0
		});
		$( "#search_city_source" ).autocomplete({
			source: cities,
			minLength: 0
		});
		$( "#doj" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "2012:2050",
			dateFormat: "yy-mm-dd"
		});
		$( "#doj_1" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "2012:2050",
			dateFormat: "yy-mm-dd"
		});
		
  });
  </script>
 
  <script>
  $(document).ready(function() {
    $("#tabs").tabs();
  });
  </script>
  <script>
  
	
	$().ready(function() {
	var id=0;
	
	$.ajax({
    url: "reviews_count.php",
    success: function(data){
    count=data;
	}
	});
	
	$.ajax({
    url: "get_reviews.php?id="+id,
    success: function(data){
    prods = data.split(';');
	result = "<p>"+prods[0]+" says : </p>"+"<p>"+prods[1]+"</p>";
	$("#review_load").html(result);
	}
	});
	
	$("#next").click(function(){
	if(id==count)
	id=1;
	$.ajax({
    url: "get_reviews.php?id="+id,
    success: function(data){
    prods = data.split(';');
	result = "<p>"+prods[0]+"  says :</p>"+"<p>"+prods[1]+"</p>";
	id=id+1;
	$("#review_load").html(result);
	}
	});})
	
	$("#prev").click(function(){
	if(id==1)
	id=count-1;
	$.ajax({
    url: "get_reviews.php?id="+id,
    success: function(data){
    prods = data.split(';');
	result = "<p>"+prods[0]+" says : </p>"+"<p>"+prods[1]+"</p>";
	id=id-1;
	$("#review_load").html(result);
	}
	});})
	
	
});

</script>
  
  <script type="text/javascript">
	function validity()
	{
		var city=document.frm_local.user_city.value;
		var area=document.frm_local.user_area.value;
		var radius=document.frm_local.radius.value;
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(city=="")
		{
			alert("Please Enter a City Name !");
			return false;
		}
		if(max_rate=="")
		{
			alert("Please enter the maximum rate you'd pay !");
			return false;
		}
	}
	function carpool_search_validity()
	{
		var source=document.search_carpool.city_source.value;
		var destn=document.search_carpool.city_destn.value;
		var doj=document.search_carpool.doj.value;
		
		if(source=="")
		{
			alert("Please Enter Source City !");
			return false;
		}
		if(destn=="")
		{
			alert("Please Enter Destination City!");
			return false;
		}
		if(doj=="")
		{
			alert("Please Enter Date of Journey !");
			return false;
		}
		
	}
	
	function validate_add_carpool()
	{
		var source=document.add_carpool.carpool_source.value;
		var destn=document.add_carpool.carpool_destn.value;
		var doj=document.add_carpool.doj.value;
		var seats=document.add_carpool.seats.value;
		var mob_num=document.add_carpool.carpool_mob_num.value;
	
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(source=="")
		{
			alert("Please Enter Source City !");
			return false;
		}
		if(destn=="")
		{
			alert("Please Enter Destination City");
			return false;
		}
		if(doj=="")
		{
			alert("Please Enter Date of Journey");
			return false;
		}
		if(seats=="")
		{
			alert("Please Enter the Number of Seats");
			return false;
		}
		if(mob_num=="")
		{
			alert("Please Enter a Mobile number");
			return false;
		}
		
	}
	
	function o_validity()
	{
		var city_source=document.frm_ostation.o_city_source.value;
		var area_source=document.frm_ostation.o_area_source.value;
		var destn=document.frm_ostation.o_city_destn.value;
		if(city_source=="")
		{
			alert("Please Enter the Source City !");
			return false;
		}
		if(area_source=="")
		{
			alert("Please Enter an Area Name !");
			return false;
		}
		if(destn=="")
		{
			alert("Please Enter a Destination Name !");
			return false;
		}
	}
	function validate()
	{	
		name = var city_source=document.frm_driver.name.value;
		dob = var city_source=document.frm_driver.dob.value;
		address = var city_source=document.frm_driver.address.value;
		mob_num = var city_source=document.frm_driver.mob_num.value;
		city_pref = var city_source=document.frm_driver.city_pref_1.value;
		dl_num = var city_source=document.frm_driver.dl_num.value;
		dl_valid = var city_source=document.frm_driver.dl_valid.value;
		min_rate = var city_source=document.frm_driver.min_rate.value;
		if(area_source=="")
		{
			alert("Please Enter an Area Name !");
			return false;
		}if(name=="")
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

<style>
@font-face {
    font-family: "Rupee_Foradian";
    font-style: normal;
    font-weight: normal;
    src: url("font/Rupee_Foradian.ttf") format("truetype");
}
</style>
  <script>
	// increase the default animation speed to exaggerate the effect
	$.fx.speeds._default = 1000;
	$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			modal: true	,
			minWidth: 500,
			minHeight: 200,
			buttons: { "Add Review": function() {
													var name_rev = $("#name_rev").val();
													var email_rev = $("#email_rev").val();
													var rev_rev = $("#rev_rev").val();
													$.ajax({
															type:"GET", url: "add_review.php",
															data: {"name":name_rev, "email":email_rev,"rev":rev_rev},
															success: function(data)
															{
																prods = data.split(';');
																result = "<p>"+name_rev+"  says :</p>"+"<p>"+rev_rev+"</p>";
																$("#review_load").html(result);
															}
															});
													$(this).dialog("close"); 
												} }
		});

		$( "#add_rev" ).click(function() {
			$( "#dialog" ).dialog( "open" );
			return false;
		});
	});
	</script>







</head>

<div class="wrapper" style="width:80%;margin-right:10%;margin-left:10%;">
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
	</div>
<div style="width:80%;margin-right:10%;margin-left:10%">
<div style="width:50%;height:480px;float:left;">
<div id="tabs" style="height:480px;">
		<ul>
			<li id="tab_1"><a href="#fragment-1"><span>Local Travel</span></a></li>
			<li id="tab_2"><a href="#fragment-2"><span>Outstation Travel</span></a></li>
			<li id="tab_3"><a href="#fragment-3"><span>Car Pooling</span></a></li>
		</ul>
		<div id="fragment-1">
		
		<form name='frm_local' onsubmit="return validity()" action='search_local.php' method="post">       
			<div>
				<b>Pick Up Point</b> </br> </br>
				
					<div class="field">
						<label class="normal" for="user_city">City :</label>
						<input id="user_city" name="user_city">
					</div>
					
					<div class="field">
						<label class="normal" for="user_area">Area : </label>
						<input id="user_area" name="user_area">
					</div>
					</br>				
					<hr>
				
					<b>Driver Preferences</b></br></br>
					
					<div class="field">
						<label class="normal" for="radius">Drivers within :</label>
						<input type="text" class="input" name="radius" id="radius" /> Kms
					</div>
					
					<div class="field">
						<label class="normal" for="car">Drivers for :</label>
						<select name="car">
							<option value="indigo">Indigo</option>
							<option value="honda">Honda</option>
							<option value="amb">Ambassador</option>
							<option value="innova">Innova</option>
							<option value="merc">Mercedes</option>
							<option value="sumo">Sumo</option>
							<option value="other">Other</option>
						</select>
					</div>
						
							
				</br>
				</br>
				</br>
				<center><input class="css3button" type="submit" value="Find Drivers !"></center>
			</div>
		</form>
		
		</div>
	
    <div id="fragment-2">
		<form name='frm_ostation' onsubmit="return o_validity()" action='search_out.php' method="post">     
				<div>	
				
				<b>Source</b> </br> </br>
				<div class="field">
					<label class="normal" for="city_source">City :</label>
					<input type="text" name="o_city_source" id="city_source" />
				</div>
				<div class="field">
					<label class="normal" for="area_source">Area :</label>
					<input type="text" name="o_area_source" id="area_source" />
				</div>
					
				
				</br>
			
			
					<b>Destination</b></br></br>
					<div class="field">
						<label class="normal" for="city_destn">City :</label>
						<input type="text" name="o_city_destn" id="city_destn" />
					</div>
				</div>
				</br>

				<hr>
					<b>Driver Preferences</b></br></br>
					
					<div class="field">
						<label class="normal" for="radius">Drivers Within</label>
						<input type="text" name="radius" id="radius" /> Kms
					</div>
					
					<div class="field">
						<label class="normal" for="car">Drivers Within</label>
						<select name="car">
						<option value="indigo">Indigo</option>
							<option value="honda">Honda</option>
							<option value="amb">Ambassador</option>
							<option value="innova">Innova</option>
							<option value="merc">Mercedes</option>
							<option value="sumo">Sumo</option>
							<option value="other">Other</option>
					</select>
					</div>					
		

			</br>
			</br>
			
			<center><input class="css3button" type="submit"value="Find Drivers !"></center>
		</form>
			
	
	</div>
		
		<div id="fragment-3">
		
			<form name="add_carpool" onsubmit="return validate_add_carpool()" action="add_itiner.php">
				<b>Add a New Travel Itinerary</b>
				</br>
				</br>
				<div class="wrapper" style="width:100%;">
					<div style="width:60%;float:left;">
						<div class="field">
							<label class="normal" for="city_source">From</label>
							<input type="text" id="add_city_source" name="carpool_source"  /> 
							</div>
						<div class="field">
							<label class="normal" for="city_destn">To</label>
							<input type="text" id="add_city_destn" name="carpool_destn"  /> 
						</div>
					
						<div class="field">
							<label class="normal" for="doj">Date of Journey</label>
							<input type="text" name="add_doj" id="doj" />
						</div>
						<div class="field">
							<label class="normal" for="seats">Seats Available</label>
							<input type="text" name="seats" id="seats" /> 
						</div>
						<div class="field">
							<label class="normal" for="mob_num">Mobile Number</label>
							<input type="text" name="carpool_mob_num" id="mob_num" /> 
						</div>
					
		
					</div>
				
					<div style="width:40%;float:right;">
						</br>
						</br>
						</br>
						<input class="css3button" value="Add New" type="submit" style="height:40px;width:100px;margin-right:100px;" /> 
					</div>
					
					<div style="clear:both;">
					</div>
				</div>
			</form>
			<hr>
			<b>Search for Carpool</b></br></br>
			<form onsubmit="return carpool_search_validity()" name="search_carpool" action = "search_itiner.php">
				<div style="width:60%;float:left;">
						<div class="field">
							<label class="normal" for="city_source">From</label>
							<input type="text" name="city_source" id="search_city_source" /> 
						</div>	
						<div class="field">
							<label class="normal" for="city_source">To</label>
							<input type="text" name="city_destn" id="search_city_destn" /> 
						</div>	
						<div class="field">
							<label class="normal" for="city_source">Date of Journey</label>
							<input type="text" name="doj" id="doj_1" /> 
						</div>
				</div>
				<div style="width:40%;float:right;">
				</br>
				</br>
						<input class="css3button" value="Search" type="submit" style="height:40px;width:100px;margin-right:100px;" /> 
					</div>
			</form>
		</div>
		<div style="clear:both;">
	</div>
	</div>
</div>

<div style="width:50%;height:240px;float:right;background-color:#ffffff;border:5px;border-color:#000000;">
<center>
	<div id="slideshow">
			<div style="background-color:#ffffff">
				<div class="sshow_head" style="font-size:2em; font-family: 'Arvo', Georgia, Times, serif;">
				Search Drivers</br>
				</div>
				<div class="sshow_details" style="font-size:1.3em; font-family: 'Arvo', Georgia, Times, serif;">
				</br>
				Step 1. Enter Travel Details</br>
				Step 2. View Driver Profiles</br>
				Step 3. Get in Touch with the driver</br>
				</div>
			</div >
			<div style="background-color:#ffffff">
				<div class="sshow_head" style="font-size:2em; font-family: 'Arvo', Georgia, Times, serif;">
				Carpool ?</br></br>
				</div>
				<div class="sshow_details" style="font-size:1.3em; font-family: 'Arvo', Georgia, Times, serif;">
				Add a New Carpool</br>
				Or </br>
				Search for Itineraries and </br> Join a Carpool
				</br>
				</div>
				
			</div>
	</div>
	</center>
</div>
<div class="review" style="width:50%;height:246px;float:right;background-color:#ffffff;">

			<center><div class="sshow_head" style="width:100%;font-size:2em; font-family: 'Arvo', Georgia, Times, serif;">Reviews</div></center>
			<div id="prev" style="float:left;margin-left:40px;margin-top:40px;"> <img alt="Show Previous Review" title="Show Previous Review" src="images/prev.png"/> </div>
			<div class="review_load" id="review_load" style="overflow: auto;height:150px;float:left;width:70%;margin-left:20px;padding:5px;font-size:1.2em; font-family: 'Arvo', Georgia, Times, serif;"></div>
			
			<div id="next" style="float:right;margin-right:40px;margin-top:40px;width:5px;"> <img alt="Show Next Review" title="Show Next Review" src="images/next.png"/> </div>
		
			<div title="Add Review" id="add_rev" style="float:right;margin-right:20px;margin-top:20px;margin-bottom:20px;font-size:1.2em;">Write Your own Review<img src="images/add_rev.png"/></div>
				<div id="dialog" title="Write Your Review">
						<div class="field">
							<label class="normal" >Name</label>
							<input style="width:150px;"type="text" id="name_rev" /> 
						</div>
						
						<div class="field">
							<label class="normal" >Email Id</label>
							<input style="width:150px;"type="text" id="email_rev" /> 
						</div>
						
						<div class="field">
							<label class="normal" >Review</label>
							<textarea style="height:150px;width:250px;" type="text" id="rev_rev" ></textarea> 
						</div>
				</div>
		</div>
	</div>
</html>
