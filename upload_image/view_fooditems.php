<?php
require_once'process.php';
require_once'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>View_Food</title>
</head>
<body>
	<h1>View Food</h1>
	<div class="flex" style="display:flex">
		<?php $sql2="select * from fooditems";?>
		<?php foreach(getData($sql2) as $row)
		{
			
			echo
			'<div style = "margin:15px; border-right:1px solid black; padding-right:30px"> <img src="assets/'. $row["file_path"].'"width="300px" height="400px"><br>	

			<p> Name:'.$row["food_name"].'</p>
			<p> description:'.$row["description"].'</p>
			<p> Price:'.$row["price"].'</p></div>';
			
			

		}
		?>
		<button>Update</button>
		<button>Delete</button>
	</div>
</body>
</html>