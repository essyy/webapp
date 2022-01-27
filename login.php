<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="loginBox">
    <img src="avaa3.jpg"  class="user">
    <h2>Login Here</h2>
    <form action="login.php" method="post"   >
        <?php echo display_error(); ?>
        <p>Username</p>
        <input type="text" name="username" id="username" placeholder="Enter username">
    
    	<p>Password</p>
    	<input type="password" name="password" id="password" placeholder="***********" >
    	<input type="submit" name="login_btn" value="Sign In">
    	<a href="#">Lost your password?</a><br>
    	<a href="register.php">Don't have an account</a>
        <!--spam><?php echo $error; ?></spam>-->



<!--	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">

		//<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>-->
	</form>
</body>
</html>