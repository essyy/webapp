<?php

require_once("connect.php");

if(isset($_POST["submitImage"]))
{
	$foodname=$_POST['food_name'];
	$price =$_POST['price'];
	$foodimage =$_FILES['food_image'];
	$description =$_POST['description'];

$original_file_name =$_FILES['food_image']['name'];
$file_tmp_location= $_FILES['food_image']['tmp_name'];

$file_type= substr($original_file_name, strpos($original_file_name,'.'),strlen($original_file_name));

$file_path = "assets/";

$new_file_name = time().$file_type;

if(move_uploaded_file($file_tmp_location, $file_path.$new_file_name))
{
$sql="INSERT INTO fooditems(food_name,price,description,image,file_path)VALUES('$foodname','$price','$description','$original_file_name','$new_file_name')";

if(setData($sql))
{
	//header("location : view_fooditems.php");
	header("location : viewimage.php");
}
}
}

?>