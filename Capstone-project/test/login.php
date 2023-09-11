<?php
session_start();
if(isset($_SESSION['unique_id'])){
//    header("location: users.php");
    header("location: http://localhost/site/accounts/orders.php");
}
?>

<?php include_once "head.php"; ?>
<body>
<div class="wrapper">
    <section class="form login">
        <header>Login to your account</header>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="field input">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Proceed to Login">
            </div>
        </form>
        <div class="link">Not yet signed up? <a href="index.php"><b>Create an Account</b></a></div>
        <div class="link"> <a style=" color: #4ca014;" href="http://localhost/site/">Back Home</a></div>
    </section>
</div>

<script src="scripts/javascript/hidePassword.js"></script>
<script src="scripts/javascript/login.js"></script>

</body>
</html>
