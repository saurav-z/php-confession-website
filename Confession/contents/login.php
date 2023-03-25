<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DeerConfess - Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<h2>Login</h2>
		<form method="post" action="action/login_action.php">
			<?php if (!empty($login_error)) { ?>
				<p class="error"><?php echo $login_error; ?></p>
			<?php } ?>
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>