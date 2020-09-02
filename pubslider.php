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
	 $game3 = $_SESSION['game3'];
		 ?></div>
 <div class="title"><h2 align="center"><strong>Pub Slider</strong></h2></div>

	<style type="text/css">
	a{
		color:#FF0000;
		text-decoration:none;
	}
	a:hover{
		text-decoration:underline;
	}
	body{
		/*
		You can remove these four options 
		
		*/
		
		
		
		height:100%;
		width:100%;
		margin:10px;
		padding-left:0px;
		text-align:left;
	}
	#puzzle_container{
		line-height:500px;
		text-align:center;
		vertical-align:center;
		border:10px outset #CCCCCC;
		position:relative;
		color: #FFFFFF;
		background-color: #707070;
		
		width: 520px;	/* IE 5.x */
		width/* */:/**/500px;	/* Other browsers */
		width: /**/500px;	
		
		height: 520px;	/* IE 5.x */
		height/* */:/**/500px;	/* Other browsers */
		height: /**/500px;			

	}
	
	#puzzle_container .square{
		overflow:hidden;
		border-left:1px solid #FFF;
		border-top:1px solid #FFF;
		position:absolute;
	}

	.activeImageIndicator{
		border:1px solid #FF0000;
		position:absolute;
		z-index:10000;
	}
	.revealedImage{
		position:absolute;
		left:0px;
		opacity:0;
		filter:alpha(opacity=50);
		top:0px;
		z-index:50000;
	}
	</style>
	
	
	<script type="text/javascript">
	
		
	var puzzleImages = ['images/pub1.jpg','images/pub2.jpg','images/pub3.jpg'];	// Array of images to choose from
	var rows = 3;
	var cols = 3;
	var points = 0;
		
	var imageArray = new Array();
	var imageInUse = false;
	var puzzleContainer;
	var activeImageIndicator = false;
	var activeSquare = false; 	// Reference to active puzzle square
	var squareArray = new Array(); // Array with references to all the squares

	
	var emptySquare_x;
	var emptySquare_y;
	
	var colWidth;
	var rowHeight;
	
	var gameInProgress = false;
	
	var revealedImage = false;
	
	for(var no=0;no<puzzleImages.length;no++){
		imageArray[no] = new Image();
		imageArray[no].src = puzzleImages[no];	
	}
	
	function initPuzzle()
	{
		gameInProgress = false;
		var tmpInUse = imageInUse;
		imageInUse = imageArray[Math.floor(Math.random() * puzzleImages.length)];
		if(imageInUse==tmpInUse && puzzleImages.length>1)
			initPuzzle();
		else{
			puzzleContainer = document.getElementById('puzzle_container');
			getImageWidth();
		}
	}
	
	function getImageWidth()
	{
		if(imageInUse.width>0){
			startPuzzle();	
		}else{
			setTimeout('getImageWidth()',100);	
		}
	}
	
	function scramble()
	{
		gameInProgress = true;
		var currentRow = cols-1;
		var currentCol = rows-1;
		
		document.getElementById('revealedImage').style.display='none';
		
		for(var no=0;no<rows;no++){
			for(var no2=0;no2<cols;no2++){
				if(no<rows.length || no2<cols.length){
					var el = document.getElementById('square_' + no2 + '_' + no);
					if(el){
						el.style.left = (no2 * colWidth) + (no2) + 'px';
						el.style.top = (no * rowHeight) + (no) + 'px';	
					}else{
						initPuzzle();
						return;
					}
				}			
			}
		}		
		
		
		var lastPos=false;
		var countMoves = 0;
		while(countMoves<(50*cols*rows)){
			var dir = Math.floor(Math.random()*4);
			var readyToMove = false;
			if(dir==0 && currentRow>0 && lastPos!=1){	// Moving peice down
				currentRow = currentRow-1;	
				readyToMove = true;
			}				
			if(dir==1 && currentRow<(rows-1) && lastPos!=0){	// Moving peice up
				currentRow = currentRow+1;
				readyToMove = true;
			}	
			if(dir==2 && currentCol>0 && lastPos!=3){ 	// Moving peice right
				currentCol = currentCol -1;
				readyToMove = true;
			}	
			if(dir==3 && currentCol<(cols-1) && lastPos!=2){ 	// Moving peice right
				currentCol = currentCol + 1;
				readyToMove = true;
			}
			if(readyToMove){
				activeSquare = document.getElementById('square_' + currentCol + '_' + currentRow);
				moveImage(false,true);	
				lastPos = dir;
				countMoves++;
			}
		}
		
		return;
	}
	
	function gameFinished()
	{
		var string = "";

		var squareWidth = colWidth + 1;
		var squareHeight = rowHeight + 1;		
		var squareCounter = 0;
		var errorsFound = false;
		var correctSquares = 0;
		for(var prop in squareArray){
			var currentCol = squareCounter % cols; 
			var currentRow = Math.floor(squareCounter/cols);
			var correctLeft = currentCol * squareWidth;
			var correctTop = currentRow * squareHeight;
			if(squareArray[prop].style.left.replace('px','') != correctLeft || squareArray[prop].style.top.replace('px','') != correctTop){
				//return;			
			}else{
				correctSquares++;
			}
				
			squareCounter++;	
		}	
		
		if(correctSquares == ((cols * rows) -1)){
			points = 70;
			document.getElementById('messageDiv').innerHTML = '<h2>Fantastic! You did it. You scored ' + points +' Points!!</h2>';
			$("#game3").html(points);
			gameInProgress = false;
			revealImage();
			
		}else{
			document.getElementById('messageDiv').innerHTML = 'Currently, you have ' + correctSquares + ' out of ' + ((cols * rows) -1) + ' pieces placed correctly';
		}
		
	}
	
	var currentOpacity = 0;
	function revealImage()
	{
		if(currentOpacity==100)currentOpacity=0;
		var obj = document.getElementById('revealedImage');
		obj.style.display = 'block';
		currentOpacity = currentOpacity +2;
		if(document.all){
			obj.style.filter = 'alpha(opacity='+currentOpacity+')';
		}else{
			obj.style.opacity = currentOpacity/100;
		}
		
		if(currentOpacity<100)setTimeout('revealImage()',10);
		
	}
	function displayActiveImage()
	{
		if(!gameInProgress)return;
		if(!activeImageIndicator){
			activeImageIndicator = document.createElement('DIV');
			activeImageIndicator.className = 'activeImageIndicator';
			puzzleContainer.appendChild(activeImageIndicator);
			activeImageIndicator.onclick = moveImage;
			
		}
		activeImageIndicator.style.display='block';
		activeImageIndicator.style.left = this.offsetLeft +  'px';
		activeImageIndicator.style.top = this.offsetTop + 'px';
		activeImageIndicator.style.width = this.style.width;
		activeImageIndicator.style.height = this.style.height;
		activeImageIndicator.innerHTML = '<span></span>';
		activeSquare = this;
	}
	
	function moveImage(e,fromShuffleFunction)
	{
		if(!activeSquare)return;
		if(!gameInProgress && !fromShuffleFunction){
			alert('You have to shuffle the cards first');
			return;
		}
		var currentLeft = activeSquare.style.left.replace('px','') /1;
		var currentTop = activeSquare.style.top.replace('px','') /1;
		
		var diffLeft = Math.round((currentLeft - emptySquare_x) / colWidth);
		var diffTop = Math.round((currentTop - emptySquare_y) / rowHeight);	
		
		if(((diffLeft==-1 || diffLeft==1) && diffTop==0) || ((diffTop==-1 || diffTop==1) && diffLeft==0)){	// Moving right
			activeSquare.style.left = emptySquare_x + 'px';
			activeSquare.style.top = emptySquare_y + 'px';
			emptySquare_x = currentLeft;
			emptySquare_y = currentTop;	
			activeSquare = false;	
			if(activeImageIndicator)activeImageIndicator.style.display = 'none';
			if(!fromShuffleFunction)gameFinished();	
		}
	}
	
	function startPuzzle()
	{
		puzzleContainer.innerHTML = '';


		var subDivs = puzzleContainer.getElementsByTagName('DIV');
		for(var no=0;no<subDivs.length;no++){
			subDivs[no].parentNode.removeChild(subDivs[no]);
		}
		activeImageIndicator = false;
		squareArray.length = 0; 

		
		if(document.getElementById('revealedImage')){
			var obj = document.getElementById('revealedImage');
			obj.parentNode.removeChild(obj);
		}
		var revealedImage = document.createElement('DIV');
		revealedImage.style.display='none';
		revealedImage.id='revealedImage';;
		revealedImage.className='revealedImage';;
		var img = document.createElement('IMG');
		img.src = imageInUse.src;
		revealedImage.appendChild(img);
		puzzleContainer.appendChild(revealedImage);
			
		colWidth = Math.round(imageInUse.width / cols)-1;
		rowHeight = Math.round(imageInUse.height / rows)-1;

		puzzleContainer.style.width = colWidth * cols + (cols * 1) + 'px';
		puzzleContainer.style.height = rowHeight * rows + (rows * 1) + 'px';
		
		if(navigator.appVersion.indexOf('5.')>=0 && navigator.userAgent.indexOf('MSIE')>=0){
			puzzleContainer.style.width = colWidth * cols + (cols * 1) + 20 + 'px';
			puzzleContainer.style.height = rowHeight * rows + (rows * 1) + 20 + 'px';			
			
		}
				
		if(!revealedImage){
			revealedImage = document.createElement('DIV');
			revealedImage.style.display='none';	
			revealedImage.innerHTML = '';
			
		}
		for(var no=0;no<rows;no++){
			for(var no2=0;no2<cols;no2++){
				if(no2==cols-1 && no==rows-1){
					emptySquare_x = (no2 * colWidth) + (no2);	
					emptySquare_y = (no * rowHeight) + (no);	
					break;
				}
				var newDiv = document.createElement('DIV');
				newDiv.id = 'square_' + no2 + '_' + no;
				newDiv.onmouseover = displayActiveImage;
				newDiv.onclick = moveImage;
				newDiv.className = 'square';
				newDiv.style.width = colWidth + 'px';
				newDiv.style.height = rowHeight + 'px';	
				newDiv.style.left = (no2 * colWidth) + (no2) + 'px';
				newDiv.style.top = (no * rowHeight) + (no) + 'px';
				newDiv.setAttribute('initPosition',(no2 * colWidth) + (no2) + '_' + (no * rowHeight) + (no));
				var img = new Image();
				img.src = imageInUse.src;
				img.style.position = 'absolute';
				img.style.left = 0 - (no2 * colWidth) + 'px';
				img.style.top = 0 - (no * rowHeight) + 'px';
				newDiv.appendChild(img);				
				puzzleContainer.appendChild(newDiv);
				squareArray.push(newDiv);
			}
		}	
		
		
	}
	window.onload = initPuzzle;
	
	</script>
</head>
<body>

<center>Earn points by completing the puzzle <br> click Scrample to begin!!</center>
<a href="#" onclick="scramble();return false">Scramble Image</a> | <a href="#" onclick="initPuzzle();return false">Select Image</a> | 
<form style="display:inline">


<div id="puzzle_container">
Please wait - initializing script
</div>

<div id="messageDiv"></div>
<p><i>Scramble, then click to move the pieces</i></p>
 
 
 
 
 
 

     <div id="game3" style="display: none;"></div>

        <button type="button" class="button" onClick="updatePoints($('#game3').html())">Back to Map (Game will be marked as complete)</button>
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
