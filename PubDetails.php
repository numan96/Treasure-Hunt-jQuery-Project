<?php 
session_start();
		 ?>

<head>

<meta charset="utf-8">
<title>Pub Details</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> 
<link rel="stylesheet" href="stylesheet.css">

<script src="https://gc.kis.scr.kaspersky-labs.com/2C6AE740-5FF3-534C-A5B4-D997C2F75EFB/main.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> 
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div id="mySidenav" class="sidenav">
 

     <button type="button" class="button" onClick="treasureRedirect()">Treasure Hunt</button>
     <button type="button" class="button" onClick="hotelRedirect()">Hotel List</button>
  <button type="button" class="button" onClick="restaurantRedirect()">Restaurant List</button>
  <button type="button" class="button" onClick="pubRedirect()">Pub List</button>
             <?php if (!empty($_SESSION['username'])) { ?>
               <button type="button" class="button" onClick="bookingsRedirect()">Manage Bookings</button>
  <button type="button" class="button" onClick="favouritesRedirect()">Favourites List</button>
  <?php } ?>
  <br>
  <button type="button"  a href="javascript:void(0)" onClick="closeNav()">&times;</button>
</div>


<script>
function openNav() {
   document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0px";
}   
	function homeRedirect() {
      window.location.href = "homepage.php";
    }   
	function contactRedirect() {
      window.location.href = "contactus.php";
    }   
	function hotelRedirect() {
      window.location.href = "HotelList.php";
    }   
	function restaurantRedirect() {
      window.location.href = "RestaurantList.php";
    }   
	function pubRedirect() {
      window.location.href = "PubList.php";
    }   
	function bookingsRedirect() {
      window.location.href = "bookings.php";
    }  
		function favouritesRedirect() {
      window.location.href = "FavouritesList.php";
    }    
	function registerRedirect() {
      window.location.href = "Register.php";
    } 
    	function loginRedirect() {
      window.location.href = "Login.php";
    }  
	function treasureRedirect() {
      window.location.href = "treasurehunt.php";
    }  
	function newsletterRedirect() {
      window.location.href = "Newsletter.php";
    } 
	
	function contactusRedirect() {
      window.location.href = "contactus.php";
    } 
	
		function navinfoRedirect() {
      window.location.href = "NavigationalInformation.php";
    } 
		function rulesRedirect() {
      window.location.href = "Rules.php";
    } 
	function logoutRedirect(){
	  // if logout button is clicked
 
    $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "logout.php", // PHP processor
      data:  $('#logoutform').serialize(),
      success: function(data) { // if ajax function results success
    document.location.href = "homepage.php";
	  }
     });
	 return false;
	}
    </script>


<div data-role="header" id="header" data-position="fixed" align="center" data-type="horizontal" data-tap-toggle="false">
 <button onClick="openNav()" data-icon="bars" id="menubtn" >Menu</button><img src="imageedit_2_7868692569.png" width="170" height="60" align="bottom"><a onClick="homeRedirect()" data-icon="home" >Home</a>
</div>



   <div id="main">

<div role="main" class="ui-content">
<div align="left"><?php
if (empty($_SESSION['username'])) { // if the session variable is not exists
echo ' <div align="center"><button type="button" onClick="loginRedirect()">Login</button></div><div align="center"><button type="button" onClick="registerRedirect()">Register</button></div>
';


}

else { // if the session variable is exists


   $session_value = $_SESSION['username'];
  
 
			 
			 echo 'Signed in as: '; echo '<b>' .$session_value; echo '</b>!';
			 ?>
<button class="button" onClick="logoutRedirect()">Logout</button></div>
<?php	 
	
	 }
	 
	  $pubid = $_GET['pubid'];;
	  
	  
	  
	  $servername = "elephant.ecs.westminster.ac.uk";
$username = "w1480440";
$password = "EUfN7VOUDm6M";
$dbname = "w1480440_0";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	  $sql = "SELECT pubID, pubname, pubLat, pubLon, pubDesc, pubRating, pubImg FROM mobile_pubs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
	if ($row["pubID"] == $pubid) { 
	
	
	
	$pubid = $row["pubID"];
	$pubname = $row["pubname"];
	$latitude = $row["pubLat"];
	$longitude = $row["pubLon"];
	?>
	
    
	<div align="center"><b><h2> <?php echo $row["pubname"]; ?> </b></h2>
    
     <b><?php if ($row["pubRating"] == 3) {
		
		echo "Rating: ★★★";
		
		} else if ($row["pubRating"] == 4){
			
			echo "Rating: ★★★★";
			
			} else if ($row["pubRating"] == 5){
			
			echo "Rating: ★★★★★";
			
			}
		
		?> 
        
        
        
        </b>
    </div>
    <br>
    <br>

    <div align="center"><img src="<?php echo $row["pubImg"]; ?>" width="350" height="250"></div>
      
      <div align="center" style="padding:50px; display: block;">
      <div id="tabs" class="ui-tabs-nav">
  <ul class="tab">
    <li><a href="#tabs-1" class="tablinks">Description</a></li>
    <li><a href="#tabs-2" class="tablinks">Menu</a></li>
  </ul>
  <div id="tabs-1" class="tabcontent">
    <p> <?php echo $row["pubDesc"]; ?> </p>
  </div>
  <div id="tabs-2"  class="tabcontent">
 <?php if ($row["pubID"] == 1) { ?>
  <h3>London Pride</h3> <b>£4.25</b> <br>
  
  <p>Pint.</p> 
<hr>

<h3>Corona</h3> <b>£4.50</b> <br>
  
  <p>275ml.</p> 
<hr>

<h3>House Wine</h3> <b>£3.95</b> <br>
  
  <p>175ml.</p> 
<hr>

<?php } ?>

<?php if ($row["pubID"] == 2) { ?>
<h3>Mac and Cheese</h3> <b>£9.75</b> <br>
  
  <p>Perfect comfort food – proper mac and cheese, finished under
the grill to make it extra gooey, served with a garlic ciabatta strip.</p> 
<hr>

<h3>Chicken, Leek & Brie Pie</h3> <b>£10.50</b> <br>
  
  <p>British chicken breast and buttered leeks in a creamy Cheddar sauce
with melted brie, encased in hot water crust pastry and topped with
a puff pastry lid.</p> 
<hr>

<h3>White Zinfandel</h3> <b>£17.75</b> <br>
  
  <p>Medium-sweet, bursting with strawberry
and watermelon. Bottle.</p> 
<hr>

<?php } ?>

<?php if ($row["pubID"] == 3) { ?>
<h3>Cumberland sausage & mash</h3> <b>£9.95</b> <br>
  
  <p>With onion gravy & savoy cabbage.</p> 
<hr>

<h3>Apple crumble.</h3> <b>£4.50</b> <br>
  
  <p>With ice cream or custard.</p> 
<hr>

<h3>Prawn Linguine</h3> <b>£9.95</b> <br>
  
  <p>With garlic & parsley.</p> 
<hr>

<?php } ?>

<?php if ($row["pubID"] == 4) { ?>
<h3>Brookyln Lager</h3> <b>£3.80</b> <br>
  
  <p>255ml Lager from the USA.</p> 
<hr>

<h3>Southern Tier Porter</h3> <b>£5.50</b> <br>
  
  <p>355ml  Porter from the USA.</p> 
<hr>

<h3>TQH Chocolate Board</h3> <b>£7.00</b> <br>
  
  <p>Doisy & Dam chocolate bar, fig truffles, chocolate cigars, strawberries, honey.</p> 
<hr>


<?php } ?>

<?php if ($row["pubID"] == 5) { ?>
<h3>Ultimate Beer Battered Fish & Chips</h3> <b>£14.95</b> <br>
  
  <p>Freshly battered fish, made with our local Meantime Pale Ale,
large portion of triple cooked chips, curry sauce, mushy peas,
homemade tartare sauce and bread and butter.</p> 
<hr>

<h3>Chicken And Bacon Club</h3> <b>£8.50</b> <br>
  
  <p>With baby gem lettuce, tomato and mayonnaise.</p> 
<hr>

<h3>Steak Sandwich</h3> <b>£10.95</b> <br>
  
  <p>Marinated rump steak topped with sauteed onions, Dijon mustard mayonnaise and rocket.</p> 
<hr>

<?php } ?>

  </div>
</div>
</div>
		<br>
		<br>

<?php	
		 if ($row["pubID"] == 2) { ?>
	

    
    
   <div align="center"> <a data-position-to="window" class="ui-icon ui-icon-tag  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline"  OnClick="window.location.href='fenchurchstreetmap.php'">Earn Rewards for this Venue</a></div>
    
    <?php	
		 } 
		 if ($row["pubID"] == 1) { ?>
         
        <div align="center">  <a data-position-to="window" class="ui-icon ui-icon-tag  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline"  OnClick="window.location.href='nottinghillgatemap.php'">Earn Rewards for this Venue</a></div>
         
         
         <?php
		 }  if ($row["pubID"] == 4) { ?>
         
         
		  <div align="center">  <a data-position-to="window" class="ui-icon ui-icon-tag  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline"  OnClick="window.location.href='piccadillycircusmap.php'">Earn Rewards for this Venue</a></div>
		 
		 <?php
		 } if ($row["pubID"] == 3) { ?>
		 
		<div align="center">  <a data-position-to="window" class="ui-icon ui-icon-tag  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline"  OnClick="window.location.href='hydeparkcornermap.php'">Earn Rewards for this Venue</a></div>
        
        
         <?php
	     } if ($row["pubID"] == 5) { 	 ?>
		
         <div align="center">  <a data-position-to="window" class="ui-icon ui-icon-tag  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline"  OnClick="window.location.href='towerhillmap.php'">Earn Rewards for this Venue</a></div>
         
         <?php } ?>





	<?php	
		
	}
	
	  }
	}



		 ?>

<div align="center"> <a href="#mapselection" data-rel="popup" data-position-to="window" class="ui-icon ui-icon-info ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline">Map Location</a>


<?php 
if (empty($_SESSION['username'])) {
	
	$favouritechecked = "";
	}
	
$yes = "yes";
$no = "no";

 $sql2 = "SELECT mobile_pubfavourites.userID, mobile_users.email, mobile_pubfavourites.pubID, mobile_pubfavourites.checked FROM mobile_pubfavourites INNER JOIN mobile_users ON mobile_pubfavourites.userID = mobile_users.userID";
 
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
	  while($row2 = $result2->fetch_assoc()) {
		  if ($row2["email"] == $session_value && $row2["pubID"] == $pubid) {
		  
		  $userid = $row2["userID"];
		  
		  if ($row2["checked"] == $yes) {
			 
			 $favouritechecked = "checked";
			  
		  }
		  
		  else if ($row2["checked"] == $no) {
			  
			  $favouritechecked = "";
			  
			  }
	
	
		  
	
		  
		  }
}
}
?>
<?php if (!empty($_SESSION['username'])) { ?>
<fieldset data-role="controlgroup" data-type="horizontal">
<input type="checkbox" name="favourite" id="favourite" class="custom" <?php echo $favouritechecked; ?>>
<label for="favourite"><span class="ui-icon-star  ui-btn-icon-left"></span>Favourite</label>
</fieldset> 

<a data-position-to="window" class="ui-icon ui-icon-calendar  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline" onClick="window.location.href='PubBookingForm.php?pubid=<?php echo $pubid; ?>&pubname=<?php echo $pubname; ?>'">Book</a>



<?php } ?>
<span class="errormess"></span>




<div data-role="popup" id="mapselection" data-overlay-theme="b" data-theme="a" data-tolerance="15,15" class="ui-content" style="width:300px; height:300px; position:fixed;">

</div>
    
    </div>
 
 
 <script>
  var pubid = '<?php echo $pubid; ?>';
  var yes = 'yes';
  var no = 'no';
  var userid = '<?php echo $userid; ?>';
  
  $('#favourite').click(function(){
    if (this.checked) {

  $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "pubfavourite.php", // PHP processor
      data: 'checked='+ yes +'&pubid=' + pubid +'&userid=' + userid,
      dataType: "html", // type of returned data
      success: function(data) { // if ajax function results success
	 $('.errormess').html(data);
  }
  
      });
	  return false;
}});
 
 
 $('#favourite').click(function(){
    if (!this.checked) {

  $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "pubfavourite.php", // PHP processor
      data: 'checked='+ no +'&pubid=' + pubid +'&userid=' + userid,
      dataType: "html", // type of returned data
      success: function(data) { // if ajax function results success
	 $('.errormess').html(data);
  }
  
      });
	  return false;
}});
 
 
 $( function() {
    $( "#tabs" ).tabs();
  } );
  
var latitude = '<?php echo $latitude; ?>';
var longitude = '<?php echo $longitude; ?>';
 	  var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('mapselection'), {
          center: new google.maps.LatLng(latitude, longitude),
          zoom: 18
        });
		
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(latitude, longitude),
			map: map,
			});
		
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNwmZzgQU7xc0DqSwTJTMIDVLJcPQUXM0&callback=initMap"
    async defer></script>








        

        

<div data-role="footer" id="footer"  data-position="fixed" align="middle" data-tap-toggle="false">
<div data-role="controlgroup" data-type="horizontal">
   <a onClick="navinfoRedirect()" class="ui-btn ui-icon-info  ui-btn-icon-notext" data-iconpos="notext">Info</a>
   <a onClick="rulesRedirect()" class="ui-btn ui-icon-edit ui-btn-icon-notext">Rules</a>
   
   <a onClick="newsletterRedirect()" class="ui-btn ui-icon-mail ui-btn-icon-notext" >Newsletter</a>
   
    <a onClick="contactusRedirect()" class="ui-btn ui-icon-user ui-btn-icon-notext">Contact Us</a>
    
  </div>
</div>   


<br>

</div>

</div>
</div>      
   </div>
</body>
</html>
