<?php
session_start();
include_once "db-config.php";
// include_once "../dbcontroller.php";
// include_once "../cart-counter.php";
if (!isset($_SESSION['unique_id'])) {
    header("location: index.php");
}
else{
    $test_id=$_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM admin_table WHERE unique_id = '{$test_id}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
    }
    else{
        session_unset();
        session_destroy();
        header("location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard-Capstone</title>
    <link href="dash-style.css" rel="stylesheet">
</head>
<body>
<div class="dashboard-header">
   
    <div>
    <a href="dashboard.php"><img src="images/<?php echo $row['img']; ?>" alt="userimage"></a>
    <h3><?php echo $row['firstname']. " " . $row['lastname'] ?></h3>
    </div>
    <h2> View All Listed Products</h2>
    
    <a href="logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
</div>

<div class="dashboard-actions">

<a href="add-product.php">
<div>
    <img src="../image/product.png" alt="addproduct">
    Add-Products
</div>
</a>
<a href="view-orders.php">
<div>
    <img src="../image/update.png" alt="View-Orders">
    View-Orders
</div>
</a>
<a href="view-product.php">
<div>
    <img src="../image/inventory.png" alt="view-product">
    View-Products
</div>
</a>

</div>


<div class='dashboard-products'>
        <?php

            $products_view = mysqli_query($conn, "SELECT * FROM itemstable ORDER BY id ASC");
            if(mysqli_num_rows($products_view) > 0){
       
                while($row4 = mysqli_fetch_assoc($products_view)){
                    $product_name = $row4['name'];
                    $product_image = $row4['image'];
                    $product_price = $row4['price'];
                    $product_id = $row4['id'];
                    
                    echo "<div class='product-view'>";
                    echo "<img src='../$product_image' alt='product-image'>";
                    echo "<h3>$product_name</h3>";
                    echo "<h3>$product_price</h3>";
                    echo "<div class=\"itemdelete\">Click> <a href=\"product-delete.php?product_id=$product_id\">DELETE</a> To remove Item</div>";
                    echo "</div>";
                }
            }
            else{
                echo "<h3>No Products Listed</h3>";
            }

        ?>
</div>






</body>
</html>