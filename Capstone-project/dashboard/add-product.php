<?php
session_start();
include_once "db-config.php";
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
    <h2>Add a Product to list on capstone shop</h2>
    
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

    <section class="Add-productForm">
        <h2></h>Add a New Product</h2>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
                
                <input type="text" name="prodname" placeholder="Product Name" required>
            </div>
            <div class="field input">
                
                <input type="number" name="prodprice" placeholder="Product Price in $" required>
            </div>
            <div class="field image">
               
                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Add Product">
            </div>
        </form>
    </section>

<script src="add-product.js"></script>





</body>
</html>