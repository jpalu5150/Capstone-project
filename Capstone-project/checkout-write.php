<?php
session_start();
include_once "dashboard/db-config.php";
$client_name = mysqli_real_escape_string($conn, $_POST['clientname']);
$client_phone = mysqli_real_escape_string($conn, $_POST['clientphone']);
$client_email = mysqli_real_escape_string($conn, $_POST['clientemail']);
$client_state = mysqli_real_escape_string($conn, $_POST['state']);
$client_address = mysqli_real_escape_string($conn, $_POST['address']);

if(!empty($client_name) && !empty($client_phone)&& !empty($client_email)&& !empty($client_state)&& !empty($client_address)){

    
                            $order_array = serialize($_SESSION["Products-bought"]);

                            $insert_query = mysqli_query($conn, "INSERT INTO `capstone_orders`(`name`, `phone_Number`, `email`, `state`, `address`, `order_array`) 
                            VALUES ('$client_name','$client_phone','$client_email','$client_state','$client_address','$order_array')");
                                
                            if($insert_query){
                                    echo "success";
                            }else{
                                
                                echo "Something went wrong. Please try again!3";
                            }
                        } else{
                                 echo "All input fields are required!";
                                }
?>