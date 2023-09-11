<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "db-config.php";
    $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);
    if(isset($product_id)){
            $delete_query = mysqli_query($conn, "DELETE FROM `itemstable` WHERE `id` = '{$product_id}'");
            header("location: view-product.php");
    }else{
        header("location: view-product.php");
    }
}else{
    header("location: login.php");
}
?>