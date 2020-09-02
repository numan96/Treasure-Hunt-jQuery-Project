<?php 
session_start();?>

<head>

 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> 
<link rel="stylesheet" href="stylesheet.css">

<script src="https://gc.kis.scr.kaspersky-labs.com/2C6AE740-5FF3-534C-A5B4-D997C2F75EFB/main.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> 
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="https://checkout.stripe.com/checkout.js"></script>
<title>Pub Booking</title>


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
<?php
if (empty($_SESSION['username'])) { // if the session 


}

else { // if the session variable is exists


   $session_value = $_SESSION['username'];
  
 
			 
			 echo 'Signed in as: '; echo '<b>' .$session_value; echo '</b>!';
			 ?>
<button class="button" onClick="logoutRedirect()">Logout</button>
<?php	 

	 }
	 
	$pubid = $_GET['pubid'];
		$pubname = $_GET['pubname'];
	 
		 ?>
 <div class="title">
   <h2 align="center"><strong>Pub Booking Form</strong></h2></div>
 
 
<br><br>
<form name="pubbookingform"  id="pubbookingform" class="ui-field-contain">

<input type="hidden" value="<?php echo $pubid?>" id="pubid">
 <input type="hidden" value="<?php echo $session_value?>" id="useremail">
 <br>
 <label class="ui-field-contain">Pub Venue:</label>

 <input type="text" value="<?php echo $pubname?>" id="pubname" readonly>
 
  <input type="hidden" value="75" id="total_value">
 
<br><br>
<label class="ui-field-contain">Date :</label>
<input type="datetime" name="date"  id = "bookdate" placeholder="YYYY-MM-DD hh:mm:ss" required autofocus>


<br><br>

<label class="ui-field-contain" >Party (includes seating):</label>
    <select id="guests">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>
<br><br>
  
       <label class="ui-field-contain">Table Reservation Type:</label>
    <select id ="reservationtype" required>
     <option value="general">General</option>
      <option value="celebration">Celebration</option>
      <option value="official">Official</option>
      <option value="other">Other</option>
    </select>
      <br><br><br><br>
    
 
<button type="button" class="button" name="submit" id="checkoutbtn" onClick="submitPubForm()">Book Venue</button><br><br>

        
          
</form>

<span class="errormess"></span>  

<div align="center" id="thankyouPayment"> </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script language='javascript'>
	  
     function submitPubForm(){
	  // if submit button is clicked
	
    var pubid = $('#pubid').val(); // define username variable
    
   var useremail = $('#useremail').val(); // define password variable
   var reservationtype = $('#reservationtype').val();
 var guestno = $('#guests').val();
 var bookdate =  $('#bookdate').val();
	
    $.ajax({ // JQuery ajax function
      type: "POST", // Submitting Method
      url: "bookpub.php", // PHP processor
      data:  'pubid='+ pubid + '&useremail=' + useremail + '&reservationtype=' + reservationtype + '&guestno=' + guestno + '&bookdate=' + bookdate,
      dataType: "html", // type of returned data
      success: function(data) { // if ajax function results success // if the returned data equal 0
        // Move to a new location or you can do something else
	    // print error message		  
		  $('.errormess').html(data);
        // Open Checkout with further options
	  
	  }
     });
	 return false;
	 }
	 
	 jQuery(function($) {
      var $form = $('#pubbookingform');
      var handler = StripeCheckout.configure({
        key: 'pk_test_cp21BcECf4kMMUbSlRlZlsMo',
        token: function(token) {
          // Use the token to create the charge with a server-side script.
          // You can access the token ID with `token.id`

          //This will be printed when the transaction is successful. To charge, server side scripting is required.
          if(token.id){
                    $("#thankyouPayment").html("Thank you, your payment was successful!");
                    
                    //You can also use the following code to re-submit the form content to another file for further processing.
                    //Don't forget to add action to your form
                    //$form.get(0).submit();

                    //Or save form data locally, using local storage.
          }
        }
      });

	 	 
	 $('#checkoutbtn').on('click', function(e) {
        // Open Checkout with further options
        handler.open({
          name: 'GHunt Booking',
          currency: 'gbp',
          description: $('#pubname').val(),
          amount: $('#total_value').val() * 100
        });
        e.preventDefault();
      });

      // Close Checkout on page navigation
      $(window).on('popstate', function() {
        handler.close();
      });
      });
	 
</script>

<br><br>
        

        
    

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
