<?php 
session_start();
		 ?>

<head>

<meta charset="utf-8">
<title>Hyde Park Corner</title>

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
 
 <div class="title"><h2 align="center"><strong>Hyde Park Corner</strong></h2></div>

  <div align="center"><b>Select A Venue to Start The Game.</b><br>
  <br>Double click a venue to set the route.<br><br>
  Click once to view more info on the venue.
  
  </div><br>
  <div id="map"></div>
 
 <script>

 	  var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 51.50543700, lng:-0.15039100},
          zoom: 16
		  // loads map in the selected location
        });
		
		
       var RMarker1 = new google.maps.Marker({
			title: 'London Hilton On Park Lane, Tap once for more Details. Or Double tap to start the game going to this location.',
			icon: '4star.png',
          position: {lat: 51.50543700, lng: -0.15039100},
          map: map,
          
        });
		
		var infowindow1 = new google.maps.InfoWindow({
			content: "The London Hilton on Park Lane is one of the premier London hotels, with Michelin dining, fantastic city views, grand ballroom, luxurious spa, 24hour gym."
			});
			
			google.maps.event.addListener(RMarker1, 'dblclick', function() {
			window.open("hiltonhotelmap.php","_self");
			});	
			
		google.maps.event.addListener(RMarker1, 'click', function() {
			infowindow1.open(map, RMarker1);
			});
			
			
			var RMarker2 = new google.maps.Marker({
			title: 'Rose & Crown Pub, Tap once for more Details. Or Double tap to start the game going to this location.',
			icon: 'pub2.png',
          position: {lat: 51.50407100, lng: -0.14901400},
          map: map,
          
        });
		
		var infowindow2 = new google.maps.InfoWindow({
			content: "Nice traditional pub."
			});
			
			google.maps.event.addListener(RMarker2, 'dblclick', function() {
			window.open("roseandcrownmap.php","_self");
			});	
			
		google.maps.event.addListener(RMarker2, 'click', function() {
			infowindow2.open(map, RMarker2);
			});
			
			
			var RMarker3 = new google.maps.Marker({
			title: ' Hard Rock Cafe London, Tap once for more Details. Or Double tap to start the game going to this location.',
			icon: 'fork2.png',
          position: {lat: 51.50387600, lng: -0.14911700},
          map: map,
          
        });
		
		var infowindow3 = new google.maps.InfoWindow({
			content: "Rock ’n’ roll-themed chain with a high-energy vibe serving burgers & American classics."
			});
			
			google.maps.event.addListener(RMarker3, 'dblclick', function() {
			window.open("hardrockmap.php","_self");
			});	
			
		google.maps.event.addListener(RMarker3, 'click', function() {
			infowindow3.open(map, RMarker3);
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
