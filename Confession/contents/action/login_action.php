<?php
// Database connection settings
$hostname = "localhost";
$dbuser = "deerconfess";
$dbpass = "#L0g1n#";
$dbname = "confess_db";

// Create connection
$db = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);

// Check connection
if (!$db) {
    echo("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Handle form submission
$username = $_POST["username"];
$password = md5($_POST["password"]);

if (empty($username) || empty($password)) {
	$login_error = "Please enter a username and password.";
} else {
	$query = "SELECT * FROM confess_users WHERE username='$username' AND password='$password'";
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) == 1) {

	echo 'Successfully Logged in';
	header("Location: ../index.php");
	exit();
} else {
	header("Location: ../login.php");
	$login_error = "Invalid username or password.";
	exit();

}




}

}
mysqli_close($db);
?>