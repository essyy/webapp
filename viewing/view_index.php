<?php
session_start();

require_once("connects.php");
		$link = connect();

		
$var = $_GET['action'];

switch ($var) {
	case 'add':
	if(!empty($_POST["quantity"])){
		
		$sql = "SELECT * FROM fooditems WHERE food_id = '" .$_GET["food_id"]."'";
		
		$result = mysqli_query($link, $sql);

		$res = getData($result);

		$itemArray = array($res[0]["food_id"]=>array('foodid'=>$res[0]["food_id"], 'fdname'=>$res[0]["food_name"], 'quantity'=>$_POST["quantity"], 'price'=>$res[0]["price"] ));

		print_r($itemArray);
		
		if(!empty($_SESSION["cart_item"])) {
			if(in_array($res[0]["food_id"] /*$_SESSION["cart_item"]['foodid']*/,array_keys($_SESSION["cart_item"]))) {
				/*foreach($_SESSION["cart_item"] as $k => $v) {
						if($res[0]["foodID"] == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])){
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
						}
				}*/
				echo "Product is already in the cart";
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}
	} 
	break;
	
	case 'remove':
	if(!empty($_SESSION["cart_item"])){
		$rem = $_GET['food_id'];
		foreach($_SESSION["cart_item"] as $key => $cartItem) {
			//if($_GET["foodID"] == $k)
			//	unset($_SESSION["cart_item"][$k]);
			if($cartItem["foodid"] == $rem){
				unset($_SESSION["cart_item"][$key]);
			}				
			if(empty($_SESSION["cart_item"]))
				unset($_SESSION["cart_item"]);
		}
	}	
	break;

	case 'empty':
	unset($_SESSION["cart_item"]);
	break;
}
header("Location: view_cart.php");
?>