<?php
include('../../admin/db_connect.php');

//Get input
$confession=$_POST['confession'];
$name=$_POST['name'];

// Check connection
if (!$db) {
    echo("Connection failed: " . mysqli_connect_error());
}

else{

    $query="INSERT into confess_confessions(name,confessions) values('$name','$confession')";
    if (mysqli_query($db, $query)) {
        echo "Confession Posted Successfully<br>";
    } else {
        echo "Error Posting Confession Please try again<br>";
    }
}
    header("Location: ../index.php");
    mysqli_close($db);
    exit();
?>