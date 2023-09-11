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

    }
    else{
        session_unset();
        session_destroy();
        header("location: index.php");
    }
}
?>

<?php
$sql = mysqli_query($conn, "SELECT * FROM admin_table WHERE unique_id = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
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
    <h2> Welcome, This is the Dashboard</h2>
    
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

<div class="dashboard-actions">

<div>
   All Products Listed: 
   <h1>
        <?php

        $sql = "SELECT * from itemstable";

        if ($result = mysqli_query($conn, $sql)) {

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );

        // Display result
        printf($rowcount);
        }
        ?>
    </h1>
</div>

<div>
  Orders Placed on Site:
  <h1>
        <?php

        $sql = "SELECT * from capstone_orders";

        if ($result = mysqli_query($conn, $sql)) {

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );

        // Display result
        printf($rowcount);
        }
        ?>
    </h1>
</div>

</div>
</body>
</html>