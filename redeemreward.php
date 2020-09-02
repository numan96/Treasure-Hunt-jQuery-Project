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

	 $redeemed = $_POST['redeemed'];
 $userid = $_POST['userid'];
 $mobilerewardsid = $_POST['mobilerewardsid'];
 
 
	 $sql = "UPDATE mobile_rewardsredeemed SET redeemed = '$redeemed' WHERE userID = '$userid' AND mobile_rewardsID = '$mobilerewardsid'";
	 
	 if ($conn->query($sql) === TRUE && $redeemed == yes) {
    echo "Moved to Redeemed.";
} 
	 return;
	 ?>