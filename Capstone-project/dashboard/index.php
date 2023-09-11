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
    <title>Capstone|Register</title>
    <link rel="stylesheet" href="dash-style.css">
</head>
<body>
<div class="Registration-form">
    <section class="form signup">
        <h1>Create Your Account</h1>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="name-details">
                <div class="field input">
                    <label>First Name</label><br>
                    <input type="text" name="firstname" placeholder="First name" required>
                </div>
                <div class="field input">
                    <label>Last Name</label><br>
                    <input type="text" name="lastname" placeholder="Last name" required>
                </div>
            </div>
            <div class="field input">
                <label>Email Address</label><br>
                <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="field input">
                <label>Password</label><br>
                <input type="password" name="password" placeholder="Create a password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
                <label>profile image</label><br>
                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Creat Your Capstone Account">
            </div>
        </form>
        <a href="login.php">
        <div class="link">Have an account already? <br>
            <b>Login now</b></div></a>
            <a href="../index.php">
        <div class="link"> Back Home</div></a>
    </section>
</div>

<script src="script.js"></script>

</body>
</html>