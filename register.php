<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" href="registar.css">

</head>
<body>
<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="register.php">
	<?php echo display_error(); ?>
	<div class="register-box">
			  <!--<img src="avaa3.jpg" class="user"><br>-->
			<h2>Register</h2><br>
			<p>Username</p>	
			<input type="text" name="username" placeholder="username"<?php echo $username; ?>>
			<p>Email_address</p>
			<input type="text" name="email" placeholder="Enter Email_address"> <?php echo $email; ?>
					
			<p>password</p>	
			<input type="password" name="password_1" placeholder="password">
			<p>Confirm password</p>
            <input type="password" name="password_2" placeholder="confirm password">    	
		
			<input type="submit" name="register_btn" value="register "id="register">




	<!--<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value=""><input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value=""><input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>-->
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
</body>
</html>