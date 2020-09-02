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


$restaurantid = $_POST['restaurantid'];
 $useremail = $_POST['useremail']; 
$reservationtype = $_POST['reservationtype'];
 $guestno = $_POST['guestno'];
 $bookdate = $_POST['bookdate'];
 
 
  $sql = "SELECT userID FROM mobile_users WHERE email = '$useremail'";

	  foreach ($conn->query($sql) as $row) {
		 $userid = $row['userID'];
	  }

  
	 $sql2 = "INSERT INTO mobile_restaurantbookings (restaurantID, userID, restaurantbookingDate, restaurantguestNo, reservationtype) VALUES ('$restaurantid', '$userid', '$bookdate','$guestno','$reservationtype')";

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