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


$hotelid = $_POST['hotelid'];
 $useremail = $_POST['useremail']; 
$roomtypes = $_POST['roomtypes'];
 $guestno = $_POST['guestno'];
 $startdate = $_POST['startdate'];
 $enddate = $_POST['enddate'];
 
 
  $sql = "SELECT userID FROM mobile_users WHERE email = '$useremail'";

	  foreach ($conn->query($sql) as $row) {
		 $userid = $row['userID'];
	  }

  
	 $sql2 = "INSERT INTO mobile_hotelbookings (hotelID, userID, roomtype, guestNo, hotelbookingDate, hotelbookingtillDate) VALUES ('$hotelid', '$userid', '$roomtypes','$guestno','$startdate', '$enddate')";

	 if ($conn->query($sql2) === TRUE) {
	  
	
    echo  "Successful Booking.";
	
	return;
} 


	 else {
		
		echo "Unsuccessful Booking.";
		 
		 return 0;
	 }
	 
	 mysqli_close($conn);
	 ?>