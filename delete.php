<?php
$host = "localhost";
$user ="root";
$password="";
$database= "food_restraunt";

$user_id ="";
$username="";
$email="";
$password="";



mysqli_report(MYSQLI_REPORT_ERROR| MYSQLI_REPORT_STRICT);
try{
	$connect = mysqli_connect($host,$user,$password,$database);
}
catch(mysqli_sql_exception $ex)
{
	echo'Error';
}

function getPosts()
{
	$posts = array();
	$posts[0] = $_POST['user_id'];
	$posts[1] = $_POST['username'];
	$posts[3] = $_POST['email'];
	$posts[7] = $_POST['password'];
	
	
	
	return $posts;
}
if(isset($_POST['search']))
{
$data = getPosts();
$search_Query = "SELECT * FROM user WHERE user_id =$data[0]";
$search_Result = mysqli_query($connect,$search_Query);
if($search_Result)
{
	if(mysqli_num_rows($search_Result))
	{
		while($row = mysqli_fetch_array($search_Result))
		{
	$user_id =$row['user_id'];
	$username =$row['username'];
	$email=$row['email'];
	$password = $row['password'];
	
	
		}
	}
else 
{
	echo 'No data for this id';
}
}
}
if(isset($_POST['delete']))
{
    $data = getPosts();
	$user_id=$_POST["user_id"];
    $delete_Query = "DELETE FROM `user` WHERE `user_id`= $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }
            else{
                echo 'Data Not Deleted';
            }
        }
    }
     catch (Exception $ex)
     {
        echo 'Error Delete ';//$ex->getMessage();
    }
}




?>

<!DOCTYPE html>
<html>
<head>
	<title>User inser and delete data</title>
	<link rel="stylesheet" type="text/css" href="delete.css">
</head>
<body>
	<div class="Part">
<form action="delete.php" method="post">
	<input type="number" name="user_id"placeholder="Id"  value="<?php echo $user_id;?>"><br>
	<input type="text" name="username" placeholder="User name" value="<?php echo $username;?>"><br>
		<input type="email" name="email" placeholder="Email_address" value="<?php echo $email;?>"><br>
	<input type="text" name="password" placeholder="password" value="<?php echo $password;?>"><br>
	
	</div>
	<div class="Buttons">
		
		
		<input type="submit" name="delete" value="Delete">
		<input type="submit" name="search" value="search">
		</div>
	</form>

</form>
</body>
</html>