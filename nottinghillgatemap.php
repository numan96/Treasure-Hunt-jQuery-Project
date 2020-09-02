<?php 
session_start();
		 ?>

<head>

<meta charset="utf-8">
<title>Notting Hill Gate</title>

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
 
 function fenchurchRedirect() {
      window.location.href = "fenchurchstreetmap.php";
    } 
	function hydeRedirect() {
      window.location.href = "hydeparkcornermap.php";
    } 
	function nottingRedirect() {
      window.location.href = "nottinghillgatemap.php";
    } 
	function piccadillyRedirect() {
      window.location.href = "piccadillycircusmap.php";
    } 
	function towerRedirect() {
      window.location.href = "towerhillmap.php";
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
echo ' <div align="center"><button type="button" onClick="loginRedirect()">Login</button></div>

<div align="center"><button type="button" onClick="registerRedirect()">Register</button></div>';


}

else { // if the session variable is exists


   $session_value = $_SESSION['username'];
  
 
			 
			 echo 'Signed in as: '; echo '<b>' .$session_value; echo '</b>!';
			 ?>
<button class="button" onClick="logoutRedirect()">Logout</button>
<?php	 
	
	 }
		 ?></div>
 
 <div class="title"><h2 align="center"><strong>Notting Hill Gate</strong></h2></div>

  <div align="center"><b>Select A Venue to Start The Game.</b><br>
  <br>Double click a venue to set the route.<br><br>
  Click once to view more info on the venue.
  
  </div><br>
 
 <div id="map"></div>
 
 <script>

 	  var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 51.50952600, lng: -0.19672500},
          zoom: 16
		  // loads map in the selected location
        });
		
		
       var RMarker1 = new google.maps.Marker({
			title: 'The Laslett, Tap once for more Details. Or Double tap to start the game going to this location.',
			icon: '5star.png',
          position: {lat: 51.50952600, lng: -0.19672500},
          map: map,
          
        });
		
		var infowindow1 = new google.maps.InfoWindow({
			content: "Newly Opened in August 2015 - The Laslett in Notting Hill, is set across five Victorian townhouses & offers elegantly designed luxury hotel suites in London."
			});
			
		google.maps.event.addListener(RMarker1, 'click', function() {
			infowindow1.open(map, RMarker1);
			});
			
		google.maps.event.addListener(RMarker1, 'dblclick', function() {
			window.open("lasletthotelmap.php","_self");
			});	
				
			
			
			var RMarker2 = new google.maps.Marker({
			title: 'The Uxbridge Arms Pub, Tap once for more Details. Or Double tap to start the game going to this location.',
			icon: 'pub1.png',
          position: {lat: 51.50829300, lng: -0.19880300},
          map: map,
          
        });
		
		var infowindow2 = new google.maps.InfoWindow({
			content: " a lovely quiet backstreet pub, surprisingly close to Notting Hill Gate station."
			});
			
		google.maps.event.addListener(RMarker2, 'click', function() {
			infowindow2.open(map, RMarker2);
			});
			
		google.maps.event.addListener(RMarker2, 'dblclick', function() {
			window.open("uxbridgearmspubmap.php","_self");
			});	
			
			var RMarker3 = new google.maps.Marker({
			title: 'Geales, Tap once for more Details. Or Double tap to start the game going to this location.',
			icon: 'fork.png',
          position: {lat: 51.50855700, lng: -0.19703900},
          map: map,
          
        });
		
		var infowindow3 = new google.maps.InfoWindow({
			content: "Fresh fish and classic accompaniments served in a sleek and simple dining room with antique mirrors."
			});
			
		google.maps.event.addListener(RMarker3, 'click', function() {
			infowindow3.open(map, RMarker3);
			});
			
		google.maps.event.addListener(RMarker3, 'dblclick', function() {
			window.open("gealesmap.php","_self");
			});	

	  }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNwmZzgQU7xc0DqSwTJTMIDVLJcPQUXM0&callback=initMap"
    async defer></script>
    
    
    
 <br>
  


        
    
 

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
