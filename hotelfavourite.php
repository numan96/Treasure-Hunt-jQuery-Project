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

	 $checked = $_POST['checked'];
 $userid = $_POST['userid'];
 $hotelid = $_POST['hotelid'];
 
 
	 $sql = "UPDATE mobile_hotelfavourites SET checked = '$checked' WHERE userID = '$userid' AND hotelID = '$hotelid'";
	 
	 if ($conn->query($sql) === TRUE && $checked == no) {
    echo "Removed from Favourites List.";
} 
 else if ($conn->query($sql) === TRUE && $checked == yes) {
    echo "Added to Favourites List.";
} 
	 return;
	 ?>