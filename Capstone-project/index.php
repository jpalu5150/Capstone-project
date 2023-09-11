<?php
session_start();
require_once("dbcontroller.php");
include_once("cart-counter.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capstone Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!-- My Shop Header-->
    <div class="header">
        <a href="index.php">
        <h1>Capstone Shop</h1>
        </a>
        <a href="cart.php">
        <div class="cart-header">
            <img src="image/Shopping_cart_icon.png">
            <span class="quantity"><?php echo $total_quantity; ?></span>
        </div>
        </a>
    </div>

    <!-- My navigation bar -->
    <div class="nav">
            <ul>
                <li><a href="index.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="dashboard/login.php">Login</a></li>
                <li><a href="dashboard/">Register</a></li>
            </ul>
    </div>

    <!-- Product Section -->
    <div class="product-section">
        
        <?php
            $product_array = $db_handle->runQuery("SELECT * FROM itemstable ORDER BY id ASC");
            if (!empty($product_array)) { 
            foreach($product_array as $key=>$value){
                ?>
                <div class="product-card">
                    <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                    <img src="<?php echo $product_array[$key]["image"]; ?>" alt="<?php echo $product_array[$key]["name"]; ?>">
                    <h3><?php echo $product_array[$key]["name"]; ?></h3>
                    <p><?php echo "$".$product_array[$key]["price"]; ?></p>
                    <div class="button"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                    </form>
                </div>

        <?php
		}
        }
        ?>




    </div>


    
</body>
</html>