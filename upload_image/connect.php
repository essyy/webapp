<?php
	function connect(){
$servername = "localhost";
$username = "root";
$password = "";
$database="food_restraunt";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database)or die("Could not connect".mysqli_connect_error());
return($conn);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

}
function setData($sql){
$conn= connect();
if(mysqli_query($conn,$sql))
{
	echo "success";
}
else
{
	echo "Error".mysqli_error($conn);
}
}

function getData($sql)
{
	$link= connect();
	$results= mysqli_query($link,$sql);
	$rows= array();

	if(mysqli_num_rows($results)>0)
	{
		while($row= mysqli_fetch_assoc($results))
		{
			$rows[]=$row;

		}
		return $rows;
	}
}

	?>