<?php 
session_start();
		 ?><head>

<meta charset="utf-8">
<title>GHunt Homepage</title>

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
	 $game3 = $_SESSION['game3'];
		 ?></div>
 <div class="title"><h2 align="center"><strong>Hotel Anagram</strong></h2></div>


	
	
	<script type="text/javascript">
	var points = 0;
 var clicks = 0;
function mygame(){
 	var myarray=[];
	var myArray = ['Apex City', 'The Laslett', 'Hotel Cafe Royal', 'London Hilton on Park Lane', 'The Tower Hotel'];
	var rand = myArray[Math.floor(Math.random() * myArray.length)];


	var a = rand;
	document.getElementById("answerr").value = a;
	var c = a.length;
		for (var ii=0;ii<c;ii++){
		myarray[ii]=a.charAt(ii);
		}

	myarray.sort(function() {return 0.5 - Math.random()}) ;

	for (var i=0;i<myarray.length;i++){
	document.f1.nw.value += (myarray[i])+"\n"; 
	}
}

function stringLength(){
  
  
    var userInput = document.getElementById("textInput").value;
	var stringToCheckAgainst = document.getElementById("answerr").value;
	
   if (userInput == stringToCheckAgainst) {	
   
  
  
	 points = points + 20;
	 alert(clicks);
	document.f1.nw.value = "";
	document.f1.textInput.value = "";

	}
	else { 
	 alert('incorrect');
document.f1.nw.value = "";
document.f1.textInput.value = "";
	}
	
	if (clicks == 5) {
	document.getElementById('puzzlereveal').style.visibility = 'hidden';
	document.getElementById('submitanswer').style.visibility = 'hidden';
	document.getElementById("message").innerHTML = "Thank you for playing, you have scored: " + points;
	 document.getElementById("backbtn").style.display = 'block';
	document.getElementById("game3").innerHTML = points;
	}

}
		
	
	</script>
</head>
<body>

 

  <h3 align="center">
         Guess which hotel venues from our site these are!
        </h3>
    
      <form name="f1">
 
    
     
        <div align="center"> <input class="large" type="text" name="nw" id="questions" style ="margin-bottom: 10px;" maxlength="10"></div>
    
    
      
     <div align="center" id="message"></div>
       <div align = "center"> <input type="button" id="puzzlereveal" value="Click to reveal puzzle" onclick="mygame(); clicks++;" style ="background-color: #f2f239"><div><br><br>

     <div id="game3" style="display: none;"></div>
       
<input type="text" id="textInput" maxlength="150"><br><br>
<input type="hidden" id="answerr" name="answerr">                            
<input type="button" id="submitanswer" onclick="stringLength()" value="Submit Here">

<button type="button" class="button" id="backbtn" onClick="updatePoints($('#game3').html())" style="display:none;">Back to Map (Game will be marked as complete)</button>
    </form>

      
      
      
      
      
      
      
 <script>
 
function updatePoints(score) {
   var email = '<?php echo $session_value; ?>';
  $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "updatepoints3.php", // PHP processor
      data: 'score='+ score +'&email=' + email,
      dataType: "html", // type of returned data
      success: function(data) {
		  // if ajax function results success
	window.location.href = "javascript:history.back()";
	//change to whatever map linked to quiz.
	
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
