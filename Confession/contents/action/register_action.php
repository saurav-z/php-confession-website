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

else{

    $query="insert into confess_users(username,password) 
    values('".$_POST['username']."','".md5($_POST['password'])."')";
    if ($db->query($query)==true) {
        echo "User registered Successfully. Wait for admin to activate your account";
    }else{
        echo "Registration Failed, Please Try Again";
    }

}
mysqli_close($db);
?>