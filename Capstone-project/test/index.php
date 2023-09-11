<?php
session_start();
if(isset($_SESSION['unique_id'])){
    header("location: http://localhost/uniproject/dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Capstone - Login</title>
    <link rel="stylesheet" href="dash-style.css">
</head>
<body>
<div class="wrapper">
    <section class="form signup">
        <header>Create Your Account</header>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="name-details">
                <div class="field input">
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="First name" required>
                </div>
                <div class="field input">
                    <label>Last Name</label>
                    <input type="text" name="lname" placeholder="Last name" required>
                </div>
            </div>
            <div class="field input">
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="field input">
                <label>Password</label>
                <input type="password" name="password" placeholder="Create a password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
                <label>profile image</label>
                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Proceed to Order">
            </div>
        </form>
        <div class="link">Have an account? <a href="login.php"><b>Login now</b></a></div>
        <div class="link"> <a style=" color: #4ca014;" href="http://localhost/uniproject/">Back Home</a></div>
    </section>
</div>

<!-- <script src="scripts/javascript/hidePassword.js"></script>
<script src="scripts/javascript/signup.js"></script> -->

</body>
</html>