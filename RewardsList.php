<?php 
session_start();
		 ?>

<head>

<meta charset="utf-8">
<title>Rewards List</title>

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
	  ?>
  
      <br>
      <br>
	 <div align="center"><b> You have <?php echo $userspoints; ?> points. </b></div><br>
    <div align="center"><a href="javascript:history.back()">Back to Map</a></div>
    
</div>
		</div>
<br><hr>

<?php
$sql2 = "SELECT mobile_rewardsredeemed.userID, mobile_users.userID, mobile_users.email, mobile_rewardsredeemed.mobile_rewardsID, mobile_rewards. mobile_rewardsID, mobile_rewards.mobile_rewardstext, mobile_rewards.mobile_rewardspts, mobile_rewardsredeemed.redeemed FROM mobile_rewardsredeemed INNER JOIN mobile_users ON mobile_rewardsredeemed.userID = mobile_users.userID INNER JOIN mobile_rewards ON mobile_rewardsredeemed.mobile_rewardsID = mobile_rewards.mobile_rewardsID";

$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
	?>
<table id="rewardsTable"><tr class="header"><th style="width:90%;" align="center">Available Rewards</th><th></th></tr>
<?php
 while($row2 = $result2->fetch_assoc()) {
		  if ($row2["email"] == $session_value && $row2["redeemed"] == no && $row2["mobile_rewardspts"] <= $userspoints) {
		  
		 $userid = $row2["userID"];
       $rewardid = $row2["mobile_rewardsID"];
	   
 echo "<tr></tr><tr><td align='center'>" . $row2["mobile_rewardstext"]. "</td>";
    ?>
	<td><button type="button" class="button" onClick="updateRedeem(<?php echo $row2['mobile_rewardsID']; ?>)">Redeem Reward</button>
	<div data-role="popup" id="myPopupDiv"></div>
	<button type="button" class="button" id="RedeemReward" onClick="RedeemReward(<?php echo $rewardid; ?>)">Move to Redeemed</button>
 </td></tr>
    

	<?php
		  
		  
}
}
}
?>  
</table>
<br><br>
<?php
$sql3 = "SELECT mobile_rewardsredeemed.userID, mobile_users.userID, mobile_users.email, mobile_rewardsredeemed.mobile_rewardsID, mobile_rewards. mobile_rewardsID, mobile_rewards.mobile_rewardstext, mobile_rewards.mobile_rewardspts, mobile_rewardsredeemed.redeemed FROM mobile_rewardsredeemed INNER JOIN mobile_users ON mobile_rewardsredeemed.userID = mobile_users.userID INNER JOIN mobile_rewards ON mobile_rewardsredeemed.mobile_rewardsID = mobile_rewards.mobile_rewardsID";

$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
	?>
<table id="rewardsTable"><tr class="header"><th style="width:90%;" align="center">Locked Rewards</th><th></th></tr>
<?php
 while($row3 = $result3->fetch_assoc()) {
		  if ($row3["email"] == $session_value && $row3["redeemed"] == no && $row3["mobile_rewardspts"] > $userspoints) {
		  
		 $rewardpoints = $row3["mobile_rewardspts"];
       
 echo "<tr></tr><tr><td align='center'>" . $row3["mobile_rewardstext"]. "</td>";
    ?>
	<td><b>You need <?php echo $rewardpoints - $userspoints; ?> points. </b></td></tr><tr></tr>
    

	<?php
		  
		  
}
}
}
?>   
</table>
<br><br>
<?php
 $sql4 = "SELECT mobile_rewardsredeemed.userID, mobile_users.userID, mobile_users.email, mobile_rewardsredeemed.mobile_rewardsID, mobile_rewards. mobile_rewardsID, mobile_rewards.mobile_rewardstext, mobile_rewards.mobile_rewardspts, mobile_rewardsredeemed.redeemed FROM mobile_rewardsredeemed INNER JOIN mobile_users ON mobile_rewardsredeemed.userID = mobile_users.userID INNER JOIN mobile_rewards ON mobile_rewardsredeemed.mobile_rewardsID = mobile_rewards.mobile_rewardsID";

$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
	?>
<table id="rewardsTable"><tr class="header"><th style="width:90%;" align="center">Redeemed Rewards</th><th></th></tr>
<?php
 while($row4 = $result4->fetch_assoc()) {
		  if ($row4["email"] == $session_value && $row4["redeemed"] == yes) {
		  
		 
       
 echo "<tr></tr><tr><td align='center'>" . $row4["mobile_rewardstext"]. "</td>";
    ?>
	<td><button type="button" class="button" onClick="updateRedeem(<?php echo $row4['mobile_rewardsID']; ?>)">Redeem Reward</button><div data-role="popup" id="myPopupDiv">
</div>  </td></tr>
    

	<?php
		  
		  
}
}
}
?>  
</table>
 
 <script>

	  function updateRedeem(reward_id) {
if (reward_id == 1) {
		$('#myPopupDiv').html("<b><div align='center'>Your reward code to give to member of staff of venue: TEPT-TETF-GEGG (Can only be redeemed once.)</b></div>");
		 $( "#myPopupDiv" ).popup( "open" );
	
	} 
	else if (reward_id == 2) {
		
		$('#myPopupDiv').html("<b><div align='center'>Your reward code to give to member of staff of venue: TEOF-OYLY-DWEF (Can only be redeemed once.)</b></div>");
		 $( "#myPopupDiv" ).popup( "open" );
		}
else if (reward_id == 3) {
		
		$('#myPopupDiv').html("<b><div align='center'>Your reward code to give to member of staff of venue: LDJW-WRTY-LOGT (Can only be redeemed once.)</b></div>");
		 $( "#myPopupDiv" ).popup( "open" );
		}
else if (reward_id == 4) {
		
		$('#myPopupDiv').html("<b><div align='center'>Your reward code to give to member of staff of venue: TEFT-OTEL-DWDA (Can only be redeemed once.)</b></div>");
		 $( "#myPopupDiv" ).popup( "open" );
		}
else if (reward_id == 5) {
		
		$('#myPopupDiv').html("<b><div align='center'>Your reward code to give to member of staff of venue: KFKF-WFDA-DWOD (Can only be redeemed once.)</b></div>");
		 $( "#myPopupDiv" ).popup( "open" );
		}
	  }
	  


	  function RedeemReward(reward_id) {
  var yes = 'yes';
  var userid = '<?php echo $userid; ?>'
  $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "redeemreward.php", // PHP processor
      data: 'redeemed='+ yes +'&mobilerewardsid=' + reward_id +'&userid=' + userid,
      dataType: "html", // type of returned data
      success: function(data) { // if ajax function results success
	window.location.href = "RewardsList.php";
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
