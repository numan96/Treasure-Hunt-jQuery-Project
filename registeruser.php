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

	 $email = $_POST['email'];
	 $password = $_POST['password']; 
 $firstname = $_POST['firstname'];
 $surname = $_POST['surname'];
 
	 $sql = "INSERT INTO mobile_users (email, password, firstname, surname) VALUES ('$email', '$password', '$firstname','$surname')";

	 if ($conn->query($sql) === TRUE) {
		  $last_id = $conn->insert_id;
		  
	
	 $sql2 = "INSERT INTO mobile_hotelfavourites (userID, hotelID, checked) VALUES ('$last_id', '1', 'no');";
	
	 $sql2 .= "INSERT INTO mobile_restaurantfavourites (userID, restaurantID, checked) VALUES ('$last_id', '1', 'no');";
	 
	  $sql2 .= "INSERT INTO mobile_pubfavourites (userID, pubID, checked) VALUES ('$last_id', '1', 'no');";
	  
	  $sql2 .= "INSERT INTO mobile_hotelfavourites (userID, hotelID, checked) VALUES ('$last_id', '2', 'no');";
	
	 $sql2 .= "INSERT INTO mobile_restaurantfavourites (userID, restaurantID, checked) VALUES ('$last_id', '2', 'no');";
	 
	  $sql2 .= "INSERT INTO mobile_pubfavourites (userID, pubID, checked) VALUES ('$last_id', '2', 'no');";
	  
	  $sql2 .= "INSERT INTO mobile_hotelfavourites (userID, hotelID, checked) VALUES ('$last_id', '3', 'no');";
	
	 $sql2 .= "INSERT INTO mobile_restaurantfavourites (userID, restaurantID, checked) VALUES ('$last_id', '3', 'no');";
	 
	  $sql2 .= "INSERT INTO mobile_pubfavourites (userID, pubID, checked) VALUES ('$last_id', '3', 'no');";
	  
	  $sql2 .= "INSERT INTO mobile_hotelfavourites (userID, hotelID, checked) VALUES ('$last_id', '4', 'no');";
	
	 $sql2 .= "INSERT INTO mobile_restaurantfavourites (userID, restaurantID, checked) VALUES ('$last_id', '4', 'no');";
	 
	  $sql2 .= "INSERT INTO mobile_pubfavourites (userID, pubID, checked) VALUES ('$last_id', '4', 'no');";
	  
	    $sql2 .= "INSERT INTO mobile_hotelfavourites (userID, hotelID, checked) VALUES ('$last_id', '5', 'no');";
	
	 $sql2 .= "INSERT INTO mobile_restaurantfavourites (userID, restaurantID, checked) VALUES ('$last_id', '5', 'no');";
	 
	  $sql2 .= "INSERT INTO mobile_pubfavourites (userID, pubID, checked) VALUES ('$last_id', '5', 'no');";
	  
	   $sql2 .= "INSERT INTO mobile_rewardsredeemed (userID, mobile_rewardsID, redeemed) VALUES ('$last_id', '1', 'no');";
	  
	     $sql2 .= "INSERT INTO mobile_rewardsredeemed (userID, mobile_rewardsID, redeemed) VALUES ('$last_id', '2', 'no');";
		 
		    $sql2 .= "INSERT INTO mobile_rewardsredeemed (userID, mobile_rewardsID, redeemed) VALUES ('$last_id', '3', 'no');";
			
			   $sql2 .= "INSERT INTO mobile_rewardsredeemed (userID, mobile_rewardsID, redeemed) VALUES ('$last_id', '4', 'no');";
			   
			    $sql2 .= "INSERT INTO mobile_rewardsredeemed (userID, mobile_rewardsID, redeemed) VALUES ('$last_id', '5', 'no');";
	  
	if (mysqli_multi_query($conn, $sql2)) {
    echo "New records created successfully";
	
	return;
} 

	 }
	 else {
		
		echo "Unsuccessful Register.";
		 
		 return 0;
	 }
	 
	 mysqli_close($conn);
	 ?>