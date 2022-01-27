<?php
require_once("connects.php");
$link = connect();

session_start();


if(isset($_POST['sub'])){	
	$total_price = 0;
	foreach ($_SESSION["cart_item"] as $key => $value) {
		$total_price += ($value["price"]*$value["quantity"]);
	}
	$address = $_POST['add'];
	$pNo = $_POST['pnumber'];
	$uid = $_SESSION['username'];
	$sqli = "INSERT INTO orders(user_id, Address, ContactNo, Bill, DateOfOrder) VALUES('$uid', '$address', '$pNo', '$total_price', CURRENT_TIMESTAMP)";
	insert($sqli);

	$res = "SELECT order_id FROM orders WHERE UserID = '$uid' && DateOfOrder = CURRENT_TIMESTAMP";
	$results = mysqli_query($link, $res);
	$resul = mysqli_fetch_assoc($results);
	$result = $resul['order_id'];

	foreach ($_SESSION["cart_item"] as $key => $value) {
		$fdid = $value["foodid"];
		$name = $value["fdname"];
		$quan = $value["quantity"];
		$fprice = $value["price"];
		$item_price = $value["quantity"]*$value["price"];

		//$sql = "INSERT INTO fooder(foodID, foodname, Quantity, Price) VALUES ('$fdid', '$name', '$quan', '$fprice')";
		$sql = "INSERT INTO ordereditems(orderID, foodID, Quantity, Price) VALUES ('$result', '$fdid', '$quan', '$item_price')";
		insert($sql);
	}
	header("Location: view_cart.php");
}
unset($_SESSION["cart_item"]);