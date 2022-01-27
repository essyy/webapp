<?php
include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<style>
	
body{
	background-image: url(perfect.jpg);
	background-size: cover;

	
	background-repeat: no-repeat;
}-->
div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
</style>
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<div class="scrollmenu">
		<a href="index.php?logout='1'" style="color:white;">logout</a>
		<a href="../viewing/view.php" >Menu
		</a>
	</div>
		<!-- logged in user information -->
		<div class="profile_info">
		<!--<img src="images/user_profile.png"  >-->
		<!--<a href="viewing/view.php" class="try"> -->
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 

						<br>
						<br>
						<!--<a href="index.php?logout='1'" style="color:white;">logout</a>-->
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>