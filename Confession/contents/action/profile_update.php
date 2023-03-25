<?php
$fileName =basename($_FILES["photo"]["name"]);
$saveTo='image/'.$fileName;
$temp_name=$_FILES['photo']['tmp_name'];
move_uploaded_file($temp_name,$saveTo);

$host = '192.168.100.7';
$username = "root";
$password = "";
$database = "dss";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "Failed";
} else {
    echo "Success";
    $query = "insert into student(Name,Address,image) 
            values('" . $_POST['name'] . "','" . $_POST['thau'] . "','".$fileName."')";
    if ($conn->query($query) == true) {
        echo "Data inserted";
    } else {
        echo "failed";
    }

}
header('Location: list.php');