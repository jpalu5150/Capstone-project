<?php
session_start();
if(isset($_SESSION['unique_id'])){
    header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Capstone|Login</title>
    <link rel="stylesheet" href="dash-style.css">
</head>
<body>
<div class="Login-form">
    <section class="form login">
        <h1>Login to your account</h1>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
                <label>Email Address</label> <br>
                <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="field input">
                <label>Password</label> <br>
                <input type="password" name="password" placeholder="Enter your password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Proceed to Login">
            </div>
        </form>
        <a href="index.php">
        <div class="link">
            Not yet registered yet?  <br>
            <b>Create an Account</b>
        </div>
        </a>
        <a href="../index.php">
        <div class="link"> Back Home</div></a>
    </section>
</div>

<script src="signin.js"></script>

</body>
</html>
