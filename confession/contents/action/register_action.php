<?php
include('../../admin/db_connect.php');

//Get input
$username=$_POST['username'];
$password=md5($_POST['password']);

// Check connection
if (!$db) {
    echo("Connection failed: " . mysqli_connect_error());
}

else{

    $query="insert into confess_users(username,password) values('$username','$password')";
    if ($db->query($query)==true) {
        echo "User registered Successfully. Wait for admin to activate your account";
    }else{
        echo "Registration Failed, Please Try Again";
    }

}
mysqli_close($db);
?>