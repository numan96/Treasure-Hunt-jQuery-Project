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

	 $points = $_POST['score'];
 $email = $_POST['email'];
 $game3 = 1;
	 $sql = "UPDATE mobile_users SET points = points +'$points' WHERE email = '$email'";
	 session_start();
	 if ($conn->query($sql) === TRUE) {
    $_SESSION['game3'] = $game3;
		echo $_SESSION['game3'];
  return;
} 
	 ?>