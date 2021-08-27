<?php
include('header.php');

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design/registerform.css">
</head>
<body>
<?php
$oldlogin = $_SESSION['login']??"" ;
$oldmail = $_SESSION['email']??"";
session_destroy();
?>
<div class="reg_form">
        <form action="register.php" method="post">
            <h1>Registration Form</h1>
           <p>Login</p><input type="text" name="login" class="name_box" value="<?=$oldlogin?>" placeholder="Write Your Login">
           <p>Password</p><input type="password" name="password" class="name_box" value="" placeholder="Write Password"
           >
           <p>Confirm Password</p><input type="password" name="confirm" class="name_box"  value="" placeholder="Repeat password">
           <p>Email</p><input type="text" name="email" class="name_box"  value="<?=$oldmail?>" placeholder="Write Your Email"><br>
            <input type="submit" value="Registration" id="loged">
            <?php if(isset($_SESSION['error'])) echo $_SESSION['error']; unset($_SESSION['error']);?>
        </form>
</div>

</body>
</html>




<?php 
include('footer.php');

?>