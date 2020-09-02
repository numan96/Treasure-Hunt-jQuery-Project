<?php 
session_start();
		 ?>

<head>

<meta charset="utf-8">
<title>Restaurant Details</title>

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
    	function loginRedirect() {
      window.location.href = "Login.php";
    }  
	function registerRedirect() {
      window.location.href = "Register.php";
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
echo ' <div align="center"><button type="button" onClick="loginRedirect()">Login</button></div><div align="center"><button type="button" onClick="registerRedirect()">Register</button></div>';


}

else { // if the session variable is exists


   $session_value = $_SESSION['username'];
  
 
			 
			 echo 'Signed in as: '; echo '<b>' .$session_value; echo '</b>!';
			 ?>
<button class="button" onClick="logoutRedirect()">Logout</button></div>
<?php	 
	
	 }
	 
	  $restaurantid = $_GET['restaurantid'];
	  
	  
	  
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
	  $sql = "SELECT restaurantID, restaurantname, restaurantLat, restaurantLon, restaurantDesc, restaurantRating, restaurantImg FROM mobile_restaurants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
	if ($row["restaurantID"] == $restaurantid) { 
	$restaurantid = $row["restaurantID"];
	$restaurantname = $row["restaurantname"];
	$latitude = $row["restaurantLat"];
	$longitude = $row["restaurantLon"];
	?>
	
    
	<div align="center"><b><h2> <?php echo $row["restaurantname"]; ?> </b></h2>
    <br>
    
    <b><?php if ($row["restaurantRating"] == 3) {
		
		echo "Rating: ★★★";
		
		} else if ($row["restaurantRating"] == 4){
			
			echo "Rating: ★★★★";
			
			} else if ($row["restaurantRating"] == 5){
			
			echo "Rating: ★★★★★";
			
			}
		
		?> 
        
        
        
        </b>
    </div>
    <br>
    <br>

    <div align="center"><img src="<?php echo $row["restaurantImg"]; ?>" width="350" height="250"></div>
      
 <div align="center" style="padding:50px; display: block;">
       <div id="tabs" class="ui-tabs-nav">
  <ul class="tab">
    <li><a href="#tabs-1" class="tablinks">Description</a></li>
    <li><a href="#tabs-2" class="tablinks">Menu</a></li>
  </ul>
  <div id="tabs-1" class="tabcontent">
    <p> <?php echo $row["restaurantDesc"]; ?> </p>
  </div>
  <div id="tabs-2"  class="tabcontent">
 <?php if ($row["restaurantID"] == 1) { ?>
  <h3>Grilled Salmon</h3> <b>£12.95</b> <br>
  
  <p>Pecan crunch & lemon.</p> 
  <hr>
  
    <h3>Smoked Chicken</h3> <b>£11.95</b> <br>
  
  <p>Avocado, mango & cashew nuts.</p> 
  <hr>
  
  <h3>Crispy Squid</h3> <b>£6.50</b> <br>
  
  <p>Lemon mayonnaise.</p> 
  <hr>
  	<?php	
		}
		?>
         <?php if ($row["restaurantID"] == 2) { ?>
         <h3>Peterhead Cod Fillet</h3> <b>£13.50</b> <br>
  
  <p>Cooked in the crispiest batter and come with geales tartare sauce.</p> 
  <hr>
  
   <h3>Geales Platter</h3> <b>£23.00</b> <br>
  
  <p>Colchester oysters, langoustines, dressed padstow crab, seaside pick and mix.
</p> 
  <hr>
  
   <h3>Geales Classic Fish Pie</h3> <b>£14.75</b> <br>
  
  <p>Salmon, smoked haddock, prawns, scottish cod.</p> 
  <hr>
        <?php	
		}
		?>
        <?php if ($row["restaurantID"] == 3) { ?>
        <h3>Kashmiri Rogan Josh</h3> <b>£19.80</b> <br>
  
  <p>A classic favourite and an intensely aromatic lamb curry of small shanks of lamb with saffron and cockscomb flower.</p> 
  <hr>
  
       <h3>Angara Chicken Tikka</h3> <b>£24.00</b> <br>
  
  <p>Smoked with garam masala & mace.</p> 
  <hr>
  
       <h3>Roast Duck Vindaloo</h3> <b>£12.00</b> <br>
  
  <p>Half barbary duck slow roasted with Vindaloo masala.</p> 
  <hr>
        <?php	
		}
		?>
        <?php if ($row["restaurantID"] == 4) { ?>
        <h3>Fiesta Burger</h3> <b>£9.00</b> <br>
  
  <p>Toasted brioche bun layered with roasted jalapeno salsa, melted Jack cheese, freshly made guacamole, pico de gallo, crisp lettuce and vine-ripened tomato.</p> 
  <hr>
  
    <h3>Grilled Chicken Arugula Salad</h3> <b>£12.00</b> <br>
  
  <p>Baby arugula, thinly sliced grilled chicken, spicy pecans, dried cranberries and fresh oranges tossed in lemon balsamic vinaigrette, topped with crumbled feta cheese.</p> 
  <hr>
  
    <h3>Tupelo Chicken Tenders</h3> <b>£8.50</b> <br>
  
  <p>Hand-breaded, lightly fried tenderloins of chicken, served with mustard and hickory barbecue sauces.</p> 
  <hr>
        <?php	
		}
		?>
        <?php if ($row["restaurantID"] == 5) { ?>
        
        <h3>Sheekh Kebab</h3> <b>£7.50</b> <br>
  
  <p>Minced lamb kebabs seasoned with chopped onions, green chilies, ginger, and roasted ground coriander and barbecued in the clay oven.</p> 
  <hr>
  
  <h3>Saag Murgh</h3> <b>£11.95</b> <br>
  
  <p>Chicken breast cubes cooked in garlic onions chopped chilies, ginger and spinach.</p> 
  <hr>
  
  <h3>Karahi Cod</h3> <b>£14.50</b> <br>
  
  <p>Cod disced fillets sizzled on a wrought iron griddle with onions, garlic, ginger, chopped green chilies in a spiced tomato curry.</p> 
  <hr>
        <?php	
		}
		?>
  </div>
</div>
</div></div>

		<br>
		<br>
	<?php	
		 if ($row["restaurantID"] == 1) { ?>
	

    
    
   <div align="center"> <a data-position-to="window" class="ui-icon ui-icon-tag  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline"  OnClick="window.location.href='fenchurchstreetmap.php'">Earn Rewards for this Venue</a></div>
    
    <?php	
		 } 
		 if ($row["restaurantID"] == 2) { ?>
         
        <div align="center">  <a data-position-to="window" class="ui-icon ui-icon-tag  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline"  OnClick="window.location.href='nottinghillgatemap.php'">Earn Rewards for this Venue</a></div>
         
         
         <?php
		 }  if ($row["restaurantID"] == 3) { ?>
         
         
		  <div align="center">  <a data-position-to="window" class="ui-icon ui-icon-tag  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline"  OnClick="window.location.href='piccadillycircusmap.php'">Earn Rewards for this Venue</a></div>
		 
		 <?php
		 } if ($row["restaurantID"] == 4) { ?>
		 
		<div align="center">  <a data-position-to="window" class="ui-icon ui-icon-tag  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline"  OnClick="window.location.href='hydeparkcornermap.php'">Earn Rewards for this Venue</a></div>
        
        
         <?php
	     } if ($row["restaurantID"] == 5) { 	 ?>
		
         <div align="center">  <a data-position-to="window" class="ui-icon ui-icon-tag  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline"  OnClick="window.location.href='towerhillmap.php'">Earn Rewards for this Venue</a></div>
         
         <?php } ?>
		 
		 <?php
		 }}}




	?>

<div align="center"> <a href="#mapselection" data-rel="popup" data-position-to="window" class="ui-icon ui-icon-info ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline">Map Location</a>



<?php 
if (empty($_SESSION['username'])) {
	
	$favouritechecked = "";
	}
	
$yes = "yes";
$no = "no";

 $sql2 = "SELECT mobile_restaurantfavourites.userID, mobile_users.email, mobile_restaurantfavourites.restaurantID, mobile_restaurantfavourites.checked FROM mobile_restaurantfavourites INNER JOIN mobile_users ON mobile_restaurantfavourites.userID = mobile_users.userID";
 
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
	  while($row2 = $result2->fetch_assoc()) {
		  if ($row2["email"] == $session_value && $row2["restaurantID"] == $restaurantid) {
		  
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

<a data-position-to="window" class="ui-icon ui-icon-calendar  ui-btn-icon-left ui-btn ui-corner-all ui-shadow ui-btn-inline" onClick="window.location.href='RestaurantBookingForm.php?restaurantid=<?php echo $restaurantid; ?>&restaurantname=<?php echo $restaurantname; ?>'">Book</a>



<?php } ?>
<span class="errormess"></span>




<div data-role="popup" id="mapselection" data-overlay-theme="b" data-theme="a" data-tolerance="15,15" class="ui-content" style="width:300px; height:300px; position:fixed;">

</div>
    
    </div>
 
 <script>
 var restaurantid = '<?php echo $restaurantid; ?>';
  var yes = 'yes';
  var no = 'no';
  var userid = '<?php echo $userid; ?>';
 
  $( function() {
    $( "#tabs" ).tabs();
  } );
  
  
  



$('#favourite').click(function(){
    if (this.checked) {

  $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "restaurantfavourite.php", // PHP processor
      data: 'checked='+ yes +'&restaurantid=' + restaurantid +'&userid=' + userid,
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
      url: "restaurantfavourite.php", // PHP processor
      data: 'checked='+ no +'&restaurantid=' + restaurantid +'&userid=' + userid,
      dataType: "html", // type of returned data
      success: function(data) { // if ajax function results success
	 $('.errormess').html(data);
  }
  
      });
	  return false;
}});
 
  
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
