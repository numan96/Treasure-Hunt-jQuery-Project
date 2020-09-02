<?php 
session_start();
		 ?><head>

<meta charset="utf-8">
<title>Pub Memory Game</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> 
<link rel="stylesheet" href="stylesheet.css">
<script src="https://gc.kis.scr.kaspersky-labs.com/2C6AE740-5FF3-534C-A5B4-D997C2F75EFB/main.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> 
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
   <link rel="stylesheet" href="memorygame.css">
     <style>
    body{
      font-family:Helvetica, Arial, Verdana;
      text-align: center;
    }
    
    #pub-memorygame{
      margin:auto;
      height: 400px;
        width: 100%;
    }
    
    .text-style1{
      font-size:14pt;
      color:#56605f;
      font-weight:normal;
      text-shadow: 1px 1px 1px #fff;
      margin:0;
      line-height:24pt;
	}
    
    .reset-button{
      margin: 0 0 1.5em 0;
    }
    
  </style>   
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
	 $game2 = $_SESSION['game2'];
		 ?></div>
 <div class="title"><h2 align="center"><strong>Pub Memory</strong></h2></div>


 
    <div id="pub-memorygame" class="quizy-memorygame">
      <ul>
          <li class="match1">
            <img src="crutchedfriar.jpg">
          </li>
          <li class="match2">
            <img src="roseandcrown.jpg">
          </li>
          <li class="match3">
            <img src="dickensinn.jpg">
          </li>
          <li class="match4">
            <img src="uxbridgearms.jpg">
          </li>
          
          <li class="match1">
            <br><br><br><p class="text-style1">Crutched Friar</p>
          </li>
          <li class="match2">
            <br><br><br><p class="text-style1">Rose & Crown</p>
          </li>
          <li class="match3">
            <br><br><br><p class="text-style1">Dickens Inn</p>
          </li>
          <li class="match4">
            <br><br><br><p class="text-style1">Uxbridge Arms</p>
          </li>
          
      </ul>
    </div>
    
    

     <div id="game2" style="display: none;"></div>

        <button type="button" class="button" onClick="updatePoints($('#game2').html())">Back to Map (Game will be marked as complete)</button>
 <script>
 
function updatePoints(score) {
   var email = '<?php echo $session_value; ?>';
  $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "updatepoints2.php", // PHP processor
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
         
         
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="jquery-1.7.1.min.js"><\/script>')</script>
  <script src="jquery-ui-1.8.17.custom.min.js"></script>
  
  <script src="jquery.flip.min.js"></script>
  <script src="jquery.quizymemorygame.js"></script>
  
  <script>
    var quizyParams = {itemWidth: 90, itemHeight: 90, itemsMargin:10, colCount:3, animType:'flip' , flipAnim:'tb', animSpeed:250, resultIcons:true, randomised:true }; 
    $('#pub-memorygame').quizyMemoryGame(quizyParams);
    $('#restart').click(function(){
      $('#pub-memorygame').quizyMemoryGame('restart');
      return false;
    });
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
