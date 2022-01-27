<?php
$host = "localhost";
$user ="root";
$password="";
$database= "food_db";

$food_id ="";
$food_name="";
$price="";
$description="";
$image ="";
$file_path="";



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
	$posts[0] = $_POST['food_id'];
	$posts[1] = $_POST['food_name'];
	$posts[2] = $_POST['price'];
	$posts[3] = $_POST['description'];
	$posts[4] = $_POST['image'];
	$posts[5] = $_POST['file_path'];

	
	
	
	return $posts;
}
if(isset($_POST['search']))
{
$data = getPosts();
$search_Query = "SELECT * FROM fooditems WHERE food_id =$data[0]";
$search_Result = mysqli_query($connect,$search_Query);
if($search_Result)
{
	if(mysqli_num_rows($search_Result))
	{
		while($row = mysqli_fetch_array($search_Result))
		{
	$food_id =$row['food_id'];
	$food_name =$row['food_name'];
	$price = $row['price'];
	$description=$row['description'];
	$image= $row['image'];
	$file_path= $row['file_path'];
	
	
	
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
	$food_id=$_POST["food_id"];
    $delete_Query = "DELETE FROM `fooditems` WHERE `food_id`= $data[0]";
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
<form action="deletion.php" method="post">
	<input type="number" name="food_id"placeholder="food_id"  value="<?php echo $food_id;?>"><br>
	<input type="text" name="food_name" placeholder="Food name" value="<?php echo $food_name;?>"><br>
		<input type="number" name="price" placeholder="price" value="<?php echo $price;?>"><br>
	<input type="text" name="description" placeholder="description" value="<?php echo $description;?>"><br>
	<input type="text" name="image" placeholder="image" value="<?php echo $image;?>"><br>
	<input type="text" name="file_path" placeholder="file_path" value="<?php echo $file_path;?>"><br>
	
	</div>
	<div class="Buttons">
		
		
		<input type="submit" name="delete" value="Delete">
		<input type="submit" name="search" value="search">
		</div>
	</form>

</form>
</body>
</html>