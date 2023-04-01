<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DeerConfess - Register</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<div class="container">
		<h2>Register</h2>
		<form method="post" action="action/register_action.php">
			<?php if (!empty($registration_error)) { ?>
				<p class="error"><?php echo $registration_error; ?></p>
			<?php } ?>
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
			<label for="confirm_password">Confirm Password:</label>
			<input type="password" id="confirm_password" name="confirm_password" required>
			<input type="submit" value="Register">
		</form>
	</div>
</body>
</html>