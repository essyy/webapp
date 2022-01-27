<?php
$host = "localhost";
$dbUsername ="root";
$dbPassword="";
$dbname= "food_restraunt";
$connect = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
if(isset($_POST['update']))
{
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
		$email = $_POST['email'];
		$password= $_POST['password'];

		$password = md5($password); 
	
		
			//$password = md5($password_1);
    $update_Query = "UPDATE `user` SET 
	`username`='".$username."',`email`='".$email."',`password`='".$password."' WHERE `user`.`user_id` =$user_id";
	 $update_Result = mysqli_query($connect, $update_Query);
	  if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    }
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update User Details</title>
	<link rel="stylesheet" type="text/css" href="update.css">
</head>
<body>
	<div class="box">
	
<form  class="input-group" action="updation.php" method="POST">
	
		<p>User_id</p>
	<input type="number" name="user_id" class="input-field" placeholder="User Id"  required>
	<p>username</p>
	<input type="text" name="username" class="input-field" placeholder="username" required>
	<p>email_address</p>
	<input type="text" name="email"  class="input-field" placeholder="Email_address" required>
	<p>password</p>
		<input type="text" name="password" placeholder="password" required>
		
		
		
		
		<input type="submit" name="update"  class="submit-btn" value="update">
		
		
</form>
</div>


</body>
</html>