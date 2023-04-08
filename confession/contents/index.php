<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confession - Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="containerc">
        <div class="confess">
            <h2>Confess Here</h2>
            <form method="post" action="action/confession_action.php">
                <label for="confession">Confession:</label>
                <textarea id="confession" name="confession" required></textarea>
                <label for="name">Name (Optional):</label>
                <input type="text" id="name" name="name">
                <input type="submit" value="Submit Confession">
            </form>
        </div>
        <div class="live-confession">
            <h2>Live Confessions</h2>

            <!--Restrict this div to non-logged in users -->
            <?php include('action/comment_action.php'); ?>

            <div id="restricted-div" <?php if(!isset($session['login_user'])) { ?>style="display:none"<?php } ?>>

                <!-- HTML code for logout button -->
                <form method="post" action="action/logout_action.php">
                <input type="submit" name="logout" value="Logout">
                </form>

                <?php
                    include('../admin/db_connect.php');
                    // Retrieve and display the latest confessions
                    $query = "SELECT * FROM confess_confessions ORDER BY id DESC LIMIT 10";
                    $result = mysqli_query($db, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='confession'>";
                        echo "<p>" . $row['confessions'] . "</p>";
                        if (!empty($row['name'])) {
                            echo "<p>By: " . $row['name'] . "</p>";
                        }
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
