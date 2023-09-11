<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Capstone Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM itemstable WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["Products-bought"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["Products-bought"]))) {
					foreach($_SESSION["Products-bought"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["Products-bought"][$k]["quantity"])) {
									$_SESSION["Products-bought"][$k]["quantity"] = 0;
								}
								$_SESSION["Products-bought"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["Products-bought"] = array_merge($_SESSION["Products-bought"],$itemArray);
				}
			} else {
				$_SESSION["Products-bought"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["Products-bought"])) {
			foreach($_SESSION["Products-bought"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["Products-bought"][$k]);				
					if(empty($_SESSION["Products-bought"]))
						unset($_SESSION["Products-bought"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["Products-bought"]);
	break;	
	case "print":
		print_r($_SESSION["Products-bought"]);
		// echo($_SESSION["Products-bought"]);
	break;
}
}
?>




<div>
	<!-- My Shop Header-->
    <div class="header">
	    <a href="index.php">
        <h1>Capstone Shop</h1>
        </a>
    
		<div>
        <h3>Your Shopping Cart</h3>
		<div class="cart-empty">
		<a href="cart.php?action=empty">Clear Cart</a>
		</div>
		</div>
    </div>


<?php
if(isset($_SESSION["Products-bought"])){
    $total_quantity = 0;
    $total_price = 0;
?>	


<?php		
    foreach ($_SESSION["Products-bought"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
			<div class="Cart-items">
				<div class="cart-image">
				<img src="<?php echo $item["image"]; ?>"/>

				</div>
				<div class="cart-product-name">
				<p><?php echo $item["name"]; ?></p>
				</div>

				<div class="cart-product-quantity">
				Quantity:
				<?php echo $item["quantity"]; ?>
				</div>

				<div class="cart-product-price">
				<p>Unit Price: <?php echo "$ ".$item["price"]; ?></p>
				<p>Total Price: <?php echo "$ ". number_format($item_price,2); ?></p>
				</div>

				<a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>">
				<div class="cart-product-remove">
				Remove
				
				</div>
				</a>

			</div>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>
<div class="Cart-total">
	<div>CART SUMMARY:</div>
	<div>
	<?php echo $total_quantity; ?> Items
	</div>
	<div>
	Total Price:
       <?php echo "$ ".number_format($total_price, 2); ?>
	</div>

</div>

<div class="cart-checkout">
<a href="checkout.php">Checkout</a>
</div>







  <?php
} else {
?>
	<div class="cart-empty-message">
		<div>Shop To add Products into Your Cart</div>
		<a href="index.php">GET BACK TO SHOPPING</a>
	</div>
<?php 
}
?>
</div>

</body>
</html>