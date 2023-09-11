<?php

session_start();

if(isset($_SESSION["Products-bought"])){
	$total_quantity = 0;
	$total_price = 0;
}
else{
	echo "<h1>No items in cart</h1>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Capstone Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<!-- My Shop Header-->
	<div class="header">
		<a href="index.php">
		<h1>Capstone Shop</h1>
		</a>

		<div>
		<h3>Checkout Page</h3>
		<div class="cart-empty">
		<a href="index.php">Shop More</a>
		</div>
		</div>
	</div>

	<div class="cart-empty">
		<a href="cart.php">View Cart</a>
		</div>

    <section class="checkout-form">
        <h2>Fill In Your Details below to Complete the Order</h2>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
			
                <input type="text" name="clientname" placeholder="Your Full Name" required>

                <input type="tel" name="clientphone" placeholder="Your Telephone Number" required>

                <input type="email" name="clientemail" placeholder="Your Email Address" required>

                <input type="text" name="state" placeholder="State You live in" required>

                <input type="text" name="address" placeholder="Your Physical address" required>

                <input class="checkout-btn" type="submit" name="submit" value="Add Product">
  
        </form>
    </section>

<script src="checkout.js"></script>

</body>
</html>