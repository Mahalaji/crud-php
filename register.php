<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="header"></div>
	<h2>Register</h2>


	<form id="register" action="process.php" method="post">
		<div class="input-group">
			<label>Username</label>
			<input type="text" id="username" name="username"  >
			<p id="name" style="color: red;"></p>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" id="email" name="email">
			<p id="mail" style="color: red;"></p>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" id="password" name="password">
			<p id="pass" style="color: red;"></p>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" id="confirmpassword" name="confirmpassword">
			<p id="confirmpass" style="color: red;"></p>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>

		<p>
			Already a member? <a href="login.php">Login</a>
		</p>

	</form>
	<script src="scrip.js"></script>
	

</body>

</html>