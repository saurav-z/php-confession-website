<?php
//Session
session_start(); // start session

include('action/comment_action.php');

include('../../admin/db_connect.php');
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
            $_SESSION['login_user'] = $username; // set session variable
														$session['login_user']=$_SESSION;
            header("Location: ../index.php");
            exit();
        } else {
            $login_error = "Invalid username or password.";
														$session['login_user']=$_SESSION;

        }
    }
}

mysqli_close($db);
?>
