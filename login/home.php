<?php 
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location:login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
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
}
body{
	background-image:url( two.jpg);
	background-size: cover;
	background-repeat: no-repeat;
}


	</style>

</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
		<div class="scrollmenu">
		<a href="create_user.php" style="color: white;"> + add user</a>
		<a href="../admin/pagin.php" style="color: white;">Viewusers </a>
		<a href="../upload_image/image.php" style="color:white;">Add image</a>
		<a href="../upload_image/view_fooditems.php" style="color:white;">View image</a>
		<a href="../landingpage/pagingvieworder.php" style="color:white;">View Order</a>
		<a href="home.php?logout='1'" style="color: white;">logout</a>
	</div>
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

		<!-- logged in user information -->
		<div class="profile_info">
			<!--<img src="../images/admin_profile.png"  >-->

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<!--<a href="home.php?logout='1'" style="color: red;">logout</a>-->
                       &nbsp;
                       <!-- <a href="create_user.php"> + add user</a>-->
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>