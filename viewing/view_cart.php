<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="views.css">
</head>
<body>

<?php
require_once("connects.php");
$link = connect();
//include("nav.php");
session_start();
?>
<div id="shopping-cart">
<div class="txt-heading"><h1>Shopping Cart</h1></div>

<a id="btnEmpty" href="view_index.php?action=empty">Empty Cart</a>
<a href="view.php">Continue Shopping</a>

<?php

if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th>Image</th>
<th>Food Name</th>
<th>Quantity</th>
<th>Unit Price</th>
<th>Price</th>
<th>Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];

        $fdid = $item['foodid'];
		$res = "SELECT file_path FROM fooditems WHERE food_id = '$fdid'";
		$results = mysqli_query($link, $res);
		$resul = mysqli_fetch_assoc($results);
		//$result = $resul['imagepathname'];

		?>
				<tr>
				<!--<td><img src="<?php //echo $item["image"]; ?>" class="cart-item-image" /><?php// echo $item["name"]; ?></td>--><td><img src="../upload_image/assets/<?php echo $resul['file_path'];?>" height = "100px" width="150px"></td>
				<td><?php echo $item["foodid"];?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td><?php echo "$ ".$item["price"]; ?></td>
				<td><?php echo "$ ". number_format($item_price,2); ?></td>
				<td><a href="view_index.php?action=remove&foodID=<?php echo $item["foodid"]; ?>" class="btnRemoveAction"><img src="icon-delete.jpg" alt="Remove Item" height="40px" width="50px"></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" style="font-weight: bold; font-size: 25px">Total:</td>
<td><?php echo $total_quantity;?></td>
<td colspan="2" align="right"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
<div class="Ord">
	<form action="ord.php" method="POST">
		<label for="address">Write the pickup point</label><br>
		<input type="text" name="add" id="address" required="true"><br><br>
		<label for="pnumber">Phone number</label><br>
		<input type="text" name="pnumber" id="phone_number" required="true"><br><br>
		<input type="submit" name="sub">
	</form>
</div>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>
</body>
</html>
