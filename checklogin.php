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

	 $login_user = $_POST['email'];
	 $login_pass = $_POST['password']; 

	 $sql = "SELECT email, password FROM mobile_users WHERE email='$login_user' AND password='$login_pass'";
	 
$result = $conn->query($sql);
session_start();
	 if ($result->num_rows > 0) {
		  
	$_SESSION['username'] = $login_user;
	echo $_SESSION['username'];
	return;
	 }
	 else if ($result == 0){
		 
		 
		 return 0;
	 }
	 
	 ?>