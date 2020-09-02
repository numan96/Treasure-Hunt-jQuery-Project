<?php 
session_start();
		 ?>
<head>

<meta charset="utf-8">
<title>Manage Bookings</title>

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
	function treasureRedirect() {
      window.location.href = "treasurehunt.php";
    }  
	function registerRedirect() {
      window.location.href = "Register.php";
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
<button class="button" onClick="logoutRedirect()">Logout</button>
<?php	 
	
	 }
		 ?></div>


<?php

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

$sql = "SELECT mobile_restaurantbookings.restaurantbookingID, mobile_restaurantbookings.restaurantID, mobile_restaurantbookings.userID, mobile_users.userID, mobile_users.email, mobile_restaurants.restaurantname FROM mobile_restaurantbookings INNER JOIN mobile_restaurants ON mobile_restaurantbookings.restaurantID = mobile_restaurants.restaurantID INNER JOIN mobile_users ON mobile_restaurantbookings.userID = mobile_users.userID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	?>
<table id="bookedrestaurantTable"><tr class="header"><th style="width:100%;" align="center">Restaurant Bookings</th><th></th></tr>
<?php
 while($row = $result->fetch_assoc()) {
		  if ($row["email"] == $session_value){
		  
		 
          $restaurantbookingid = $row["restaurantbookingID"];
    $restaurantname = $row["restaurantname"];
         
 echo "<tr></tr><tr><td align='center'>" . $row["restaurantname"]. "</td>";
    ?>
	<td><button type="button" class="button" onClick="window.location.href='RestaurantBookingDetails.php?restaurantbookingid=<?php echo $restaurantbookingid; ?>&restaurantname=<?php echo $restaurantname; ?>'">View Booking</button></td>
    
	<?php
		  
		  
}
}
}
?>  
</table>
<br><br>
<?php
$sql2 = "SELECT mobile_hotelbookings.hotelbookingID, mobile_hotelbookings.hotelID, mobile_hotelbookings.userID, mobile_users.userID, mobile_users.email, mobile_hotels.hotelname FROM mobile_hotelbookings INNER JOIN mobile_hotels ON mobile_hotelbookings.hotelID = mobile_hotels.hotelID INNER JOIN mobile_users ON mobile_hotelbookings.userID = mobile_users.userID";


$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
	?>
    <table id="bookedhotelTable"><tr class="header"><th style="width:100%;" align="center">Hotel Bookings</th><th></th></tr>
	<?php
 while($row2 = $result2->fetch_assoc()) {
		  if ($row2["email"] == $session_value) {
		  
		  
   $hotelbookingid = $row2["hotelbookingID"];
    $hotelname = $row2["hotelname"];
		 
	echo "<tr></tr><tr><td align='center'>" . $row2["hotelname"]. "</td>";
	
		 ?>  <td><button type="button" class="button" onClick="window.location.href='HotelBookingDetails.php?hotelbookingid=<?php echo $hotelbookingid; ?>&hotelname=<?php echo $hotelname; ?>'">View Booking</button></td>
   
<?php 
		  
}
}
}
?>  
</table>
<br><br>
<?php
$sql3 = "SELECT mobile_pubbookings.pubbookingID, mobile_pubbookings.pubID, mobile_pubbookings.userID, mobile_users.userID, mobile_users.email, mobile_pubs.pubname FROM mobile_pubbookings INNER JOIN mobile_pubs ON mobile_pubbookings.pubID = mobile_pubs.pubID INNER JOIN mobile_users ON mobile_pubbookings.userID = mobile_users.userID";

$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
	 ?>
<table id="bookedpubtable"><tr class="header"><th style="
width:100%;" align="center">Pub Bookings</th><th></th></tr>
  
   <?php
 while($row3 = $result3->fetch_assoc()) {
		  if ($row3["email"] == $session_value) {
		 
		 
	$pubbookingid = $row3["pubbookingID"];
    $pubname = $row3["pubname"];
		 
	echo "<tr></tr><tr><td align='center'>" . $row3["pubname"]. "</td>";
		?> <td><button type="button" class="button" onClick="window.location.href='PubBookingDetails.php?pubbookingid=<?php echo $pubbookingid; ?>&pubname=<?php echo $pubname; ?>'">View Booking</button></td>
       

<?php  
		  
}
}
}
?>  
        
</table>
      <span class="errormess"></span>  
 </div>
 
 
 <script>
 
	  function unfavouritePub(delete_id) {
 var userid = '<?php echo $userid; ?>';
  var no = 'no';
  $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "pubfavourite.php", // PHP processor
      data: 'checked='+ no +'&pubid=' + delete_id +'&userid=' + userid,
      dataType: "html", // type of returned data
      success: function(data) { // if ajax function results success
	window.location.href = "FavouritesList.php";
  }
  
      });
	  return false;
 }
  
 function unfavouriteHotel(delete_id) {
 
 var userid2 = '<?php echo $userid2; ?>';
  var no = 'no';
  $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "hotelfavourite.php", // PHP processor
      data: 'checked='+ no +'&hotelid=' + delete_id +'&userid=' + userid2,
      dataType: "html", // type of returned data
      success: function(data) { // if ajax function results success
	window.location.href = "FavouritesList.php";
  }
  
      });
	  return false;

 }
 
function unfavouriteRestaurant(delete_id) {
   var userid3 = '<?php echo $userid3; ?>';
   var no = 'no';
  $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "restaurantfavourite.php", // PHP processor
      data: 'checked='+ no +'&restaurantid=' + delete_id +'&userid=' + userid3,
      dataType: "html", // type of returned data
      success: function(data) { // if ajax function results success
	window.location.href = "FavouritesList.php";
  }
  
      });
	  return false;
}
 
 </script>   
 
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
