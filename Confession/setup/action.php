<?php
// Retrieve the form values
$host = $_POST['host'];
$dbuser = $_POST['username'];
$dbpass = $_POST['password'];
$dbname = $_POST['dbname'];

// Create the database connection
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    echo("Connection failed: " . mysqli_connect_error());
}

// Create users table
$sql = "CREATE TABLE IF NOT EXISTS confess_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "<hr><br>Table confess_users created successfully<br>";
} else {
    echo "Error creating table confess_users: " . mysqli_error($conn) . "<br>";
}

// Create comments table
$sql = "CREATE TABLE IF NOT EXISTS confess_comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    comment VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table confess_comments created successfully<br>";
} else {
    echo "Error creating table confess_comments: " . mysqli_error($conn) . "<br>";
}
// Create images table
$sql = "CREATE TABLE IF NOT EXISTS confess_images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    data BLOB
)";

if (mysqli_query($conn, $sql)) {
    echo "Table confess_images created successfully<br>";
} else {
    echo "Error creating table confess_images: " . mysqli_error($conn) . "<br>";
}
// Create confessions table
$sql = "CREATE TABLE IF NOT EXISTS confess_confessions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    confession VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table confess_confessions created successfully<br>";
    echo "If all the above messages are success then setup is complete. You can now detete this directory.";
} else {
    echo "Error creating table confess_confessions: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);

?>
