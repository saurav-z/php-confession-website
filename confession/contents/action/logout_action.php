<!-- PHP code for logout -->
<?php
include('/action/comment_action.php');
if(isset($_POST['logout'])) {
    $session['login_user']=[''];
    session_destroy(); // destroy session
 
  header("location: ../login.php"); // redirect to login page
}
?>