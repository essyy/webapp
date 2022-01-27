<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="views.css">
</head>
<body>

<?php
	session_start();
//include("nav.php");
?>
<h1>Menu</h1>
<hr>
<?php

require_once("connects.php");
$link = connect();

$sql = "SELECT * FROM fooditems ";
$result = mysqli_query($link, $sql);

$res = getData($result);


if (!empty($res)) { 
	foreach($res as $key=>$value){
?>
	<div class="product-item">
		<form method="POST" action="view_index.php?action=add&food_id=<?php echo $value["food_id"]; ?>">
			<div class="product-image"><img src="../upload_image/assets/<?php echo $value['file_path'];?>" height = "100px" width="150px"></div>
			<div class="product-name"><?php echo $value["food_name"]; ?></div>
			<div class="product-desc"><?php echo $value["description"]?></div>
			<div class="product-price"><?php echo "$".$value["price"]; ?></div>
			<div class="product-quantity"><input type="text" name="quantity" value="1" size="2" /></div>
			<input type="submit" value="Add to Cart" class="btnAddAction"/>
			</div>
		</form>
	</div>
<?php
	}
}else{
	echo "No record found";
}

//include("bottom.html");
?>


</body>
</html>


