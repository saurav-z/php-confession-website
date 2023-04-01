<?php
// Get the database information entered by the user
$host = $_POST['host'];
$username = $_POST['username'];
$password = $_POST['password'];
$database = $_POST['dbname'];

// Create the database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    echo("Connection failed: " . mysqli_connect_error());
}

// Create users table
$sql = "CREATE TABLE IF NOT EXISTS confess_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    image VARCHAR(100) NOT NULL
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

// Create confessions table
$sql = "CREATE TABLE IF NOT EXISTS confess_confessions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    confessions VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table confess_confessions created successfully<br>";
} else {
    echo "Error creating table confess_confessions: " . mysqli_error($conn) . "<br>";
}

// Define the SQL query to create the table
$sql = "CREATE TABLE IF NOT EXISTS confess_media (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    media_name VARCHAR(255) NOT NULL
)";

// Execute the query and check for errors
if (mysqli_query($conn, $sql)) {
    echo "Table confess_media created successfully<br>";
} else {
    echo "Error creating table confess_media: " . mysqli_error($conn) . "<br>";
}




if ($conn){
        //Create db_connect.php file
        $phpstr = "<?php\n";
        $phpstr .= "// Database connection settings\n";
        $phpstr .= "\$hostname = \"$host\";\n";
        $phpstr .= "\$dbuser = \"$username\";\n";
        $phpstr .= "\$dbpass = \"$password\";\n";
        $phpstr .= "\$dbname = \"$database\";\n";
        $phpstr .= "\n";
        $phpstr .= "// Create connection\n";
        $phpstr .= "\$db = mysqli_connect(\$hostname, \$dbuser, \$dbpass, \$dbname);\n";
        $phpstr .= "\$conn = \$db;\n";
        $phpstr .= "?>\n";

        // Write the new database connection string to the db_connect.php file
        $file_path = "../admin/db_connect.php";
        $file = fopen($file_path, "w");
        fwrite($file, $phpstr);
        fclose($file);

        //Success Message

        echo "Connection File created successfully<br>";
        echo "If all the above messages are success then setup is complete. You can now detete this directory.";

        } else {
            echo "Error Creating Connection File Please run setup script again." . mysqli_error($conn) . "<br>";
}
mysqli_close($conn);
exit;
?>