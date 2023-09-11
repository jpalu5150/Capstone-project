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
    <h2> View all Capstone Shop Orders</h2>
    
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


<?php

            echo "<div class=\"individual-order\">";
            $orders_view = mysqli_query($conn, "SELECT * FROM capstone_orders ORDER BY id ASC");
            if(mysqli_num_rows($orders_view) > 0){
       
                while($row4 = mysqli_fetch_assoc($orders_view)){
                    $order_id = $row4['id'];
                    $client_name = $row4['name'];
                    $client_number = $row4['phone_Number'];
                    $client_email = $row4['email'];
                    $client_state = $row4['state'];
                    $client_address = $row4['address'];
                    $order_array = unserialize($row4['order_array']);
                    
                    echo "<div class='Order-items'>";
                    echo "<h3>ORDER NO:<b> $order_id</b></h3>";
                    echo "<h3>CLIENT NAME:<b> $client_name</b></h3>";
                    echo "<h3>PHONE NUMBER:<b> $client_number</b></h3>";
                    echo "<h3>EMAIL:<b> $client_email</b></h3>";
                    echo "<h3>STATE:<b> $client_state</b></h3>";
                    echo "<h3>Home Adress:<b> $client_address</b></h3>";
                    echo "<div class=\"lineup-cart\">";
                   



                    // Print the array
                    foreach ($order_array as $item){
                        $item_price = $item["quantity"]*$item["price"];
                        
                        echo "<div class=\"cart-client\">";
                        echo "<img class=\"Order-image\" src=\"http://localhost/uniproject/$item[image]\" alt=\"product-image\"/></h3>";
                        echo "<div>$item[name]</div>";
                        echo "<div>$item[quantity]</div>";
                        echo "<div>$item[price]</div>";
                        echo "</div>";
                        
                        }
                        
                        echo "</div>";
                    echo "</div>";

                }
            }
            else{
                echo "<h3>No Products Listed</h3>";
            }

            echo "</div>";

?>



</body>
</html>