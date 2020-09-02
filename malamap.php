<?php 
session_start();
		 ?>

<head>

<meta charset="utf-8">
<title>Mala Indian TH</title>

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
	function rewardsRedirect() {
      window.location.href = "RewardsList.php";
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

$sql = "SELECT userID, email, points  FROM mobile_users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
 while($row = $result->fetch_assoc()) {
		  if ($row["email"] == $session_value) {
	 
	 $userspoints = $row["points"];
	 
	
            
             
       
		  }}}
		 
		  $game1 = $_SESSION['game1'];
  $game2 = $_SESSION['game2'];
$game3 = $_SESSION['game3']; 
	  ?>
		 </div>
 
 <div class="title"><h2 align="center"><strong>Mala Indian</strong></h2></div>
<button class="button" onClick="rewardsRedirect()">Rewards List</button>
  <br><hr><div align="center"><b> You have <?php echo $userspoints; ?> points. </b></div><hr>
 
<div id="map"></div>
 <?php 



 ?>
 <script>
 
 var map;
      function initMap() {
		   var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
		
        map = new google.maps.Map(document.getElementById('map'), {
           position:{lat: 51.50641900, lng: -0.07044600},
          zoom: 19
		  // loads map in the selected location 
		  
        });
		
		 directionsDisplay.setMap(map);
		 
		 calcRoute();
		 
		 
		 function calcRoute() {

              var waypts = [];


              stop = new google.maps.LatLng(51.509066 , -0.073782)
                      waypts.push({
                          location:stop,
                          stopover:true});
              stop = new google.maps.LatLng(51.507891 , -0.073889)
                      waypts.push({
                          location:stop,
                          stopover:true});
              stop = new google.maps.LatLng(51.506515 , -0.074061)
                      waypts.push({
                          location:stop,
                          stopover:true});
             
              
			  //startpoint fenchurch street
              start  = new google.maps.LatLng(51.509801 , -0.075263);
              end = new google.maps.LatLng(51.50641900, -0.07044600);

              var request = {
                  origin: start,
                  destination: end,
                  waypoints: waypts,
                  optimizeWaypoints: true,
                  travelMode: google.maps.DirectionsTravelMode.WALKING
              };

              directionsService.route(request, function(response, status) {
                  if (status == google.maps.DirectionsStatus.OK) {
                      directionsDisplay.setDirections(response);
                      var route = response.routes[0];

                  }
              });
  
		 
		 
		
		
 var RMarker1 = new google.maps.Marker({
			title: 'Mala Indian Restaurant Start Position',
          position: start,
		  icon: 'start.png',
          map: map,
          
        });
		
		var infowindow1 = new google.maps.InfoWindow({
			content: "Here is your start position where the game will begin from."
			});
			
		google.maps.event.addListener(RMarker1, 'click', function() {
			infowindow1.open(map, RMarker1);
			});
			
			
			 var RMarker2 = new google.maps.Marker({
			title: 'Game 1',
			icon: 'game.png',
          position: {lat:51.509066 , lng:-0.073782},
          map: map,
          
        });
		
			 var RMarker2green = new google.maps.Marker({
			title: 'Game 1',
			icon: 'game.png',
          position: {lat:51.509066 , lng:-0.073782},
          map: map,
          visible: false,
        });
		var infowindow2 = new google.maps.InfoWindow({
			content: "This is game 1 which will be.... tap twice to begin"
			});
			
		google.maps.event.addListener(RMarker2, 'click', function() {
			infowindow2.open(map, RMarker2);
			});
			
			google.maps.event.addListener(RMarker2, 'dblclick', function() {
			window.open("restaurantquiz.php","_self");
			});
			
			<?php if ($game1 == 1){ ?>
			
			RMarker2green.setIcon('complete.png');
			RMarker2green.setVisible(true);
				
			<?php } ?>
				
				
				
			
			 
			 
			 
			 var RMarker3 = new google.maps.Marker({
			title: 'Game 2',
			icon: 'game.png',
          position: {lat: 51.507891, lng: -0.073889},
          map: map,
          
        });
		 var RMarker3green = new google.maps.Marker({
			title: 'Game 2',
			icon: 'game.png',
          position: {lat: 51.507891, lng: -0.073889},
          map: map,
          visible: false,
        });
		var infowindow3 = new google.maps.InfoWindow({
			content: "This is game 2 which will be.... tap twice to begin"
			});
			
		google.maps.event.addListener(RMarker3, 'click', function() {
			infowindow3.open(map, RMarker3);
			// RMarker3.setVisible(false);  
			});
			
			google.maps.event.addListener(RMarker3, 'dblclick', function() {
			window.open("restaurantmemory.php","_self");
			});
			
			
			
			<?php if ($game2 == 1){ ?>
			
			RMarker3green.setIcon('complete.png');
			RMarker3green.setVisible(true);
				
			<?php } ?>
			
			 var RMarker4 = new google.maps.Marker({
			title: 'Game 3',
			icon: 'game.png',
          position: {lat: 51.506515, lng: -0.074061},
          map: map,
          
        });
		
		 var RMarker4green = new google.maps.Marker({
			title: 'Game 3',
			icon: 'game.png',
          position: {lat: 51.506515, lng: -0.074061},
          map: map,
           visible: false,
        });
		
		var infowindow4 = new google.maps.InfoWindow({
			content: "This is game 3 which will be.... tap twice to begin"
			});
			
		google.maps.event.addListener(RMarker4, 'click', function() {
			infowindow4.open(map, RMarker4);
			});
			
			google.maps.event.addListener(RMarker4, 'dblclick', function() {
			window.open("restaurantanagram.php","_self");
			});
			<?php if ($game3 == 1){ ?>
			
			RMarker4green.setIcon('complete.png');
			RMarker4green.setVisible(true);
				
			<?php } ?>
			
			
			
			 var RMarker5 = new google.maps.Marker({
			title: 'Mala Indian Restaurant',
			icon: 'fork.png',
          position: {lat: 51.50641900, lng:-0.07044600},
		  
          map: map,
          
        });
		
		var infowindow5 = new google.maps.InfoWindow({
			content: "Here is the game end point. Display your score to a member of staff to recieve your prizes"
			});
			
		google.maps.event.addListener(RMarker5, 'click', function() {
			infowindow5.open(map, RMarker5);
			});
		
			<?php if ($game1 == 1 && $game2 == 1 && $game3 == 1){ ?>
	   window.location.href = "FinalRewardsList.php";
		
				<?php } ?>	
			
	  }}
	  
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
