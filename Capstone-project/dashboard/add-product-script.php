<?php
session_start();
include_once "db-config.php";
$product_name = mysqli_real_escape_string($conn, $_POST['prodname']);
$product_price = mysqli_real_escape_string($conn, $_POST['prodprice']);

if(!empty($product_name) && !empty($product_price)){

            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);

                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions) === true){
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($img_type, $types) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        $db_img_name = 'item-images/'.$new_img_name;
                        if(move_uploaded_file($tmp_name,"../item-images/".$new_img_name)){
                            function MakeRandomString($length = 10) {
                                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $randomString = substr(str_shuffle($characters), 0, $length);
                             
                                return $randomString;
                             }
                            $ran_id = MakeRandomString(6);
                            $encrypt_pass = md5($password);
                            $insert_query = mysqli_query($conn, "INSERT INTO `itemstable`(`name`, `code`, `image`, `price`) 
                            VALUES ('$product_name','$ran_id','$db_img_name','$product_price')");
                                
                            if($insert_query){
                                    echo "success";
                            }else{
                                
                                echo "Something went wrong. Please try again!3";
                            }
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }else{
                    echo "Please upload an image file - jpeg, png, jpg";
                }
        }else{
    echo "All input fields are required!";
}
?>